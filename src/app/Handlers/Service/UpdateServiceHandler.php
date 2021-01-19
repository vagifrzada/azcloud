<?php

namespace App\Handlers\Service;

use Exception;
use App\Entities\Service\Service;
use Illuminate\Support\Facades\DB;
use App\Commands\Service\UpdateServiceCommand;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class UpdateServiceHandler
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @param UpdateServiceCommand $command
     * @throws Exception
     */
    public function handle(UpdateServiceCommand $command): void
    {
        try {
            DB::beginTransaction();

            $service = $command->getService();
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
            logger('Error occurred while updating service', compact('e'));
            throw $e;
        }
    }
}