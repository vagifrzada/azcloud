<?php

namespace App\Handlers\Post;

use Exception;
use App\Entities\Post\Post;
use Illuminate\Support\Facades\DB;
use App\Commands\Post\CreatePostCommand;

class CreatePostHandler extends AbstractPostHandler
{
    /**
     * @param CreatePostCommand $command
     * @throws Exception
     */
    public function handle(CreatePostCommand $command): void
    {
        DB::beginTransaction();

        try {
            $post = new Post();
            $post->setAuthorId(auth()->id());
            $post->setStatus((bool) $command->status);

            // Setting translations.
            foreach ($post->translatedAttributes as $attribute) {
                foreach ($command->{$attribute} as $locale => $value) {
                    $translation = ($attribute === 'meta') ? json_encode($value) : $value;
                    $post->translateOrNew($locale)->{$attribute} = $translation;
                }
            }

            // Storing post.
            $this->postRepository->save($post);

            // Syncing tags.
            if ($command->tags !== null)
                $post->tags()->sync($this->prepareTags($command->tags)->toArray());

            // Uploading main cover.
            if ($command->image !== null)
                $post->addMedia($command->image)->toMediaCollection(Post::MEDIA_COVER);

            // Uploading gallery.
            if ($command->images !== null)
                foreach ($command->images as $image)
                    $post->addMedia($image)->toMediaCollection(Post::MEDIA_GALLERY);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing post.', compact('e'));
            throw $e;
        }
    }
}