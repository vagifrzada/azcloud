<?php

namespace App\Console\Commands;

use Aws\S3\S3Client;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use App\Entities\Product\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use App\Entities\Product\Category\Category;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use InvalidArgumentException;
use Throwable;

class SyncFlavorsConsoleCommand extends Command
{
    protected $description = 'Sync flavors from AWS Bucket';
    protected $signature = 'sync:flavors';
    private const FLAVORS_FILE_NAME = 'flavors.json';

    public function handle()
    {
        try {
            $client = $this->getClient();
            $file = '/tmp/' . self::FLAVORS_FILE_NAME;
            $client->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => self::FLAVORS_FILE_NAME,
                'SaveAs' => $file,
            ]);

            if (!file_exists($file)) {
                $this->error('File not saved in location: ' . $file);
                return;
            }

            $decodedData = json_decode(file_get_contents($file), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error('Invalid json file.' . $file);
                return;
            }

            if (filled($decodedData)) {
                $this->saveToDatabase($decodedData);
                $this->flushCache();
                $this->info('Flavors synced successfully.');
                return;
            }
            $this->error('Can not decode json file.');
        } catch (Throwable $e) {
            dd($e->getMessage());
        }
    }

    private function saveToDatabase(array $decodedData)
    {
       DB::beginTransaction();
       try {
           DB::table('product_flavors')->truncate();

           foreach ($decodedData as $item) {
               $name = $item['product'];
               $category = $item['slug'];
               $slug = Str::slug($name);

               $productEntity = Product::where('slug', $slug)
                   ->orWhere('title', $name)
                   ->first();

               if (!filled($productEntity)) {
                   $productEntity = Product::create([
                       'category_id' => $this->mapCategory($category),
                       'title' => $name,
                       'slug' => $slug,
                       'status' => 1,
                   ]);
               }

               if (!filled($flavors = $item['flavors'])) {
                   $this->info("No flavors found for product: {$name}");
                   return;
               }

               foreach ($flavors as $key => &$flavor) {
                   if (stripos($flavor['name'], 'test') !== false) {
                       unset($flavors[$key]);
                       continue;
                   }

                   $flavor['monthly_price'] = $flavor['price'];
                   $flavor['hourly_price'] = round($flavor['price'] / 720, 9);

                   $flavor['product_id'] = $productEntity->id;
                   $flavor['flavor_id'] = $flavor['id'];
                   $flavor['type'] = $category;
                   $flavor['family'] = strtolower(mb_substr($flavor['name'], 0, 1, 'UTF-8'));

                   unset($flavor['id'], $flavor['price']);
               }

               DB::table('product_flavors')->insert($flavors);
           }

           DB::commit();
       } catch (Throwable $e) {
           DB::rollBack();
           dd($e->getMessage());
       }
    }

    private function mapCategory(string $category): int
    {
        $category = mb_strtolower($category, 'UTF-8');
        $categoryMap = config('flavors.categories');

        if (!array_key_exists($category, $categoryMap)) {
            throw new InvalidArgumentException(
                "Invalid category suplied ! Category: {$category}, Acceptable (Mapped) categories: 'vm=compute', 'volume=storage', 'lb=network'"
            );
        }

        $mappedCategory = $categoryMap[$category];
        if (!($categoryEntity = Category::where('slug', $mappedCategory)->first())) {
            throw new InvalidArgumentException(
                "Category doesn't exist in our database. Please, create category with slug '{$mappedCategory}' from admin panel."
            );
        }

        return $categoryEntity->id;
    }

    private function getClient(): S3Client
    {
        return new S3Client([
            'version'  => 'latest',
            'region'   => env('AWS_DEFAULT_REGION'),
            'endpoint' => env('AWS_ENDPOINT'),
            'url' => env('AWS_URL'),
            'use_path_style_endpoint' => true,
            'scheme' => env('AWS_SCHEME', 'http'),
            'credentials' => [
                'key'    => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
    }

    private function flushCache(): void
    {
        Artisan::call('cache:clear');
    }
}
