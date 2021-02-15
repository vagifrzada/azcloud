<?php

namespace App\Commands\Page;

use App\Entities\Page\Page;
use App\Core\CommandBus\Command;
use Illuminate\Http\UploadedFile;

class UpdatePageCommand extends Command
{
    /** @var array $title */
    public $title;

    /** @var array $description */
    public $description;

    /** @var array $content */
    public $content;

    /** @var bool $status */
    public $status;

    /** @var UploadedFile[] $images */
    public $images;

    /** @var array $meta */
    public $meta;

    /** @var Page $page */
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getPage(): Page
    {
        return $this->page;
    }
}