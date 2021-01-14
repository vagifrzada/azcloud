<?php

namespace Database\Seeders;

use Throwable;
use Faker\Factory;
use App\Entities\Post\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        $locales = config('laravellocalization.supportedLocales');

        $cover = storage_path('app/temp/cover.jpg');
        $gallery = storage_path('app/temp/gallery.jpg');

        for ($i = 0; $i < 100; $i++) {
           try {
               $post = new Post();
               $post->setAuthorId(rand(1, 10));
               $post->setStatus(true);
               $post->setCreatedAt($faker->dateTimeThisYear);

               foreach ($locales as $locale => $information) {
                   $post->translateOrNew($locale)->title = $faker->realText(50) . $locale;
                   $post->translateOrNew($locale)->slug = $faker->slug() . $locale;
                   $post->translateOrNew($locale)->content = $faker->realText(1000) . $locale;
               }

               $post->addMedia($cover)->preservingOriginal()->toMediaCollection('cover');
               $post->addMedia($gallery)->preservingOriginal()->toMediaCollection('gallery');

               $post->save();
           } catch (Throwable $e) {
               dd($e->getMessage());
           }
        }
    }
}
