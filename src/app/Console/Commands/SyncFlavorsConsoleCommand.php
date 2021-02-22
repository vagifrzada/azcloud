<?php

namespace App\Console\Commands;

use App\Entities\Product\Category\Category;
use App\Entities\Product\Product;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
                $this->info(self::FLAVORS_FILE_NAME . ' does not exist in bucket !');
                return;
            }

            $flavors = $storage->get(self::FLAVORS_FILE_NAME);
            $decodedData = json_decode($flavors, true);
            if (filled($decodedData)) {
                $this->saveToDatabase($decodedData);
                $this->info('Flavors synced successfully.');
                return;
            }
            $this->info('Can not decode json file.');
        } catch (FileNotFoundException $e) {
            dd($e->getMessage());
        }
    }

    private function saveToDatabase(array $decodedData)
    {
        DB::table('product_flavors')->truncate();

        foreach ($decodedData as $product) {
            $name = $product['product'];
            $category = $product['slug'];
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

            if (!filled($flavors = $product['flavors'])) {
                $this->info("No flavors found for product: {$product}");
                return;
            }

            foreach ($flavors as &$flavor) {
                $flavor['product_id'] = $productEntity->id;
                $flavor['flavor_id'] = $flavor['id'];
                unset($flavor['id']);
                $flavor['type'] = $category;
                $flavor['family'] = mb_substr($flavor['name'], 0, 1, 'UTF-8');
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
}
