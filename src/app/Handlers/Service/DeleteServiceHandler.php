<?php

namespace App\Handlers\Service;

use App\Commands\Service\DeleteServiceCommand;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class DeleteServiceHandler
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function handle(DeleteServiceCommand $command): void
    {
        $this->serviceRepository->remove($this->serviceRepository->get($command->getId()));
    }
}