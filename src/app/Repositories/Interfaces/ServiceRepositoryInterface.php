<?php

namespace App\Repositories\Interfaces;

use App\Entities\Service\Service;

interface ServiceRepositoryInterface
{
    public function save(Service $service): Service;
    public function get(int $id): Service;
    public function remove(Service $service): bool;
}