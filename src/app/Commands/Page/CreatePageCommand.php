<?php

namespace App\Commands\Page;

use App\Core\CommandBus\Command;
use Illuminate\Http\UploadedFile;

class CreatePageCommand extends Command
{
    /** @var array $title */
    public $title;

    /** @var array $description */
    public $description;

    /** @var array $content */
    public $content;

    /** @var string $identity */
    public $identity;

    /** @var bool $status */
    public $status;

    /** @var UploadedFile[] $images */
    public $images;
}