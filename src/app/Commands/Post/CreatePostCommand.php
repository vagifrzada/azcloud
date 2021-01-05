<?php

namespace App\Commands\Post;

use App\Core\CommandBus\Command;
use Illuminate\Http\UploadedFile;

class CreatePostCommand extends Command
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
}