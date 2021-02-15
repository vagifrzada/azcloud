<?php

namespace App\Handlers\Page;

use Exception;
use App\Entities\Page\Page;
use Illuminate\Support\Facades\DB;
use App\Commands\Page\CreatePageCommand;
use App\Repositories\Interfaces\PageRepositoryInterface;

class CreatePageHandler
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param CreatePageCommand $command
     * @throws Exception
     */
    public function handle(CreatePageCommand $command): void
    {
        DB::beginTransaction();

        try {
            $page = new Page();
            $page->setIdentity($command->identity);
            $page->setStatus((bool) $command->status);

            foreach ($page->translatedAttributes as $attribute) {
                foreach ($command->{$attribute} as $locale => $value) {
                    $translation = ($attribute === 'meta') ? json_encode($value) : $value;
                    $page->translateOrNew($locale)->{$attribute} = $translation;
                }
            }

            $this->pageRepository->save($page);

            // Uploading gallery.
            if ($command->images !== null)
                foreach ($command->images as $image)
                    $page->addMedia($image)->toMediaCollection(Page::MEDIA_GALLERY);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            logger()->error('Error occurred while storing page.', compact('e'));
            throw $e;
        }
    }
}