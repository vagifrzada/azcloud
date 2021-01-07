<?php

namespace App\Commands\Post;

use App\Entities\Post\Post;
use App\Core\CommandBus\Command;
use Illuminate\Http\UploadedFile;

class UpdatePostCommand extends Command
{
    /** @var array $title */
    public $title;

    /** @var array $slug */
    public $slug;

    /** @var array $content */
    public $content;

    /** @var bool $status */
    public $status;

    /** @var array $tags */
    public $tags;

    /** @var UploadedFile $image */
    public $image;

    /** @var UploadedFile[] $images */
    public $images;

    /** @var Post $post */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPost(): Post
    {
        return $this->post;
    }
}