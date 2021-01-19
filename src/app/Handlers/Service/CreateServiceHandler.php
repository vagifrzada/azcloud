<?php

namespace App\Handlers\Service;

use Exception;
use App\Entities\Service\Service;
use Illuminate\Support\Facades\DB;
use App\Commands\Service\CreateServiceCommand;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class CreateServiceHandler
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @param CreateServiceCommand $command
     * @throws Exception
     */
    public function handle(CreateServiceCommand $command): void
    {
        try {
            DB::beginTransaction();

            $service = new Service();
            $service->setStatus((bool) $command->status);
            $service->setPrice((float) $command->price);

            foreach ($service->translatedAttributes as $attribute)
                foreach ($command->{$attribute} as $locale => $value)
                    $service->translateOrNew($locale)->{$attribute} = $value;

            $this->serviceRepository->save($service);

            if ($command->image !== null)
                $service->addMedia($command->image)->toMediaCollection(Service::MEDIA_COVER);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            logger('Error occurred while creating service', compact('e'));
            throw $e;
        }
    }
}