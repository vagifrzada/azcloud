<?php

namespace App\Handlers\Page;

use Exception;
use App\Entities\Page\Page;
use Illuminate\Support\Facades\DB;
use App\Commands\Page\UpdatePageCommand;
use App\Repositories\Interfaces\PageRepositoryInterface;

class UpdatePageHandler
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @param UpdatePageCommand $command
     * @throws Exception
     */
    public function handle(UpdatePageCommand $command)
    {
        DB::beginTransaction();

        try {
            $page = $command->getPage();
            $page->setStatus((bool) $command->status);

            // Setting translations.
            foreach ($page->translatedAttributes as $attribute) {
                foreach ($command->{$attribute} as $locale => $value) {
                    $translation = ($attribute === 'meta') ? json_encode($value) : $value;
                    $page->translate($locale)->{$attribute} = $translation;
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
            logger()->error('Error occurred while updating page.', compact('e'));
            throw $e;
        }
    }
}