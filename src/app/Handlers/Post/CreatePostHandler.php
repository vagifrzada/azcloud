<?php

namespace App\Handlers\Post;

use Throwable;
use App\Entities\Post\Post;
use Illuminate\Support\Facades\DB;
use App\Commands\Post\CreatePostCommand;

class CreatePostHandler extends AbstractPostHandler
{
    public function handle(CreatePostCommand $command): void
    {
        DB::beginTransaction();

        try {
            $post = new Post();
            $post->setAuthorId(auth()->id());
            $post->setStatus((bool)$command->status);

            // Setting translations.
            foreach ($post->translatedAttributes as $attribute)
                foreach ($command->{$attribute} as $locale => $value)
                    $post->translateOrNew($locale)->{$attribute} = $value;

            // Storing post.
            $this->postRepository->save($post);

            // Syncing tags.
            $post->tags()->sync($this->prepareTags($command->tags)->toArray());

            // Uploading main cover.
            $post->addMediaFromRequest('image')->toMediaCollection('cover');

            // Uploading gallery.
            foreach ($command->images as $image)
                $post->addMedia($image)->toMediaCollection('gallery');

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            logger()->error('Error occurred while storing post.', compact('e'));
        }
    }
}