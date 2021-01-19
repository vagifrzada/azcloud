<?php

namespace App\Commands\Service;

use App\Core\CommandBus\Command;
use App\Entities\Service\Service;
use Illuminate\Http\UploadedFile;

class UpdateServiceCommand extends Command
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

    /** @var Service $service */
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getService(): Service
    {
        return $this->service;
    }
}