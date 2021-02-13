<?php

namespace App\Repositories;

use RuntimeException;
use App\Entities\Page\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    public function get(int $id): Page
    {
        return Page::findOrFail($id);
    }

    public function getByIdentity(string $identity): ?Page
    {
        return Page::where('identity', $identity)->where('status', true)->first();
    }

    public function remove(Page $page): bool
    {
        return (bool) $page->delete();
    }

    public function save(Page $page): Page
    {
        if (!$page->save())
            throw new RuntimeException("Can't save post.");
        return $page;
    }
}