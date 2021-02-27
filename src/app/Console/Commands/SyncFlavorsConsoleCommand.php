<?php

namespace App\Console\Commands;

use App\Entities\Product\Category\Category;
use App\Entities\Product\Product;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SyncFlavorsConsoleCommand extends Command
{
    protected $description = 'Sync flavors from AWS Bucket';
    protected $signature = 'sync:flavors';
    private const FLAVORS_FILE_NAME = 'flavors.json';

    public function handle()
    {
        try {
            $storage = Storage::disk('s3');
            if (!$storage->exists(self::FLAVORS_FILE_NAME)) {
                $this->error(self::FLAVORS_FILE_NAME . ' does not exist in bucket !');
                return;
            }

            $flavors = $storage->get(self::FLAVORS_FILE_NAME);
            $decodedData = json_decode($flavors, true);
            if (filled($decodedData)) {
                $this->saveToDatabase($decodedData);
                $this->flushCache();
                $this->info('Flavors synced successfully.');
                return;
            }
            $this->error('Can not decode json file.');
        } catch (FileNotFoundException $e) {
            dd($e->getMessage());
        }
    }

    private function saveToDatabase(array $decodedData)
    {
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
                    'status' => 0,
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
    }

    private function mapCategory(string $category): int
    {
        $category = mb_strtolower($category, 'UTF-8');
        $categoryMap = [
            'vm' => 'compute', 'volume' => 'storage', 'lb' => 'networking',
        ];

        if (!array_key_exists($category, $categoryMap)) {
            throw new \InvalidArgumentException(
                "Invalid category suplied ! Category: {$category}, Acceptable (Mapped) categories: 'vm=compute', 'volume=storage', 'lb=networking'"
            );
        }

        $mappedCategory = $categoryMap[$category];
        if (!($categoryEntity = Category::where('slug', $mappedCategory)->first())) {
            throw new \InvalidArgumentException(
                "Category doesn't exist in our database. Please, create category with slug '{$mappedCategory}' from admin panel."
            );
        }

        return $categoryEntity->id;
    }

    private function flushCache(): void
    {
        Cache::forget('product_flavors_vm');
        Cache::forget('product_flavors_vm_families');
        Cache::forget('product_flavors_storage');
        Cache::forget('product_flavors_storage_families');
    }
}
