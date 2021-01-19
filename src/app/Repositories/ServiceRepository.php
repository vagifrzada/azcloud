<?php

namespace App\Repositories;

use RuntimeException;
use App\Entities\Service\Service;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function save(Service $service): Service
    {
        if (!$service->save())
            throw new RuntimeException("Can't save service.");
        return $service;
    }

    public function get(int $id): Service
    {
        return Service::findOrFail($id);
    }

    public function remove(Service $service): bool
    {
        return (bool) $service->delete();
    }
}