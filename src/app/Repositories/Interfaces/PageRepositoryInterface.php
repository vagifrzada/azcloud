<?php

namespace App\Repositories\Interfaces;

use App\Entities\Page\Page;

interface PageRepositoryInterface
{
    public function get(int $id): Page;
    public function getByIdentity(string $identity): ?Page;
    public function remove(Page $page): bool;
    public function save(Page $page): Page;
}