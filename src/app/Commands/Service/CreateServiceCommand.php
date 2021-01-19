<?php

namespace App\Commands\Service;

use App\Core\CommandBus\Command;
use Illuminate\Http\UploadedFile;

class CreateServiceCommand extends Command
{
    /** @var array $title */
    public $title;

    /** @var array $subtitle */
    public $subtitle;

    /** @var array $slug */
    public $slug;

    /** @var array $content */
    public $content;

    /** @var bool $status */
    public $status;

    /** @var int $price */
    public $price;

    /** @var UploadedFile $image */
    public $image;
}