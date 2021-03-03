<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\{Collection, Facades\DB, Facades\Cache};

class CalculatorWidget extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        $page = $this->config['page'] ?? null;
        if ($page === null) return '';
        if (!filled($vmList = $this->parseVmList())) return '';

        return view('widgets.calculator', [
            'page'  => $page,
            'vmList' => $vmList,
            'vmFamilies' => $this->getVmFamilies(),
            'storageList' => $this->getStorageList(),
            'storageFamilies' => $this->getStorageFamilies(),
        ]);
    }

    private function parseVmList(): Collection
    {
        return Cache::rememberForever('product_flavors_vm', function() {
            $vmList = DB::table('product_flavors')
                ->where('type', 'vm')
                ->orderBy('hourly_price', 'ASC')
                ->get();

            if ($vmList->isEmpty())
                return collect();

            $vmList->map(function ($item) {
                $item->label = sprintf('%s: %d vCPU, %d GB RAM, %d GB Root Volume, %f AZN/hour', $item->name, $item->cpu, $item->ram, $item->disk, $item->hourly_price);
                $item->os = ($item->isWindowsOnly == 1) ? 'windows' : 'linux';
                return $item;
            });

            return $vmList;
        });
    }

    private function getVmFamilies()
    {
        return Cache::rememberForever('product_flavors_vm_families', function() {
            return DB::table('product_flavors')
                ->select('family')
                ->where('type', 'vm')
                ->groupBy('family')
                ->orderBy('family', 'ASC')
                ->get();
        });
    }

    private function getStorageList()
    {
        return Cache::rememberForever('product_flavors_storage', function() {
            $storageList = DB::table('product_flavors')
                ->select(['name', 'size', 'family', 'hourly_price'])
                ->where('type', 'volume')
                ->orderBy('hourly_price', 'ASC')
                ->get();

            if ($storageList->isEmpty())
                return collect();

            $familyLabels = ['s' => 'standart', 'u' => 'ultimate', 't' => 'turbo'];
            $storageList->map(function ($item) use ($familyLabels) {
                $item->label = sprintf('%s: %d GB, %f AZN/hour', $item->name, $item->size,  $item->hourly_price);
                $item->family = $familyLabels[$item->family] ?? $item->family;
                return $item;
            });

            return $storageList;
        });
    }

    private function getStorageFamilies()
    {
        return Cache::rememberForever('product_flavors_storage_families', function() {
            $storageFamilies =  DB::table('product_flavors')
                ->select('family')
                ->where('type', 'volume')
                ->groupBy('family')
                ->orderBy('family', 'DESC')
                ->get();

            if ($storageFamilies->isNotEmpty()) {
                $familyLabels = ['s' => 'standart', 'u' => 'ultimate', 't' => 'turbo'];
                $storageFamilies->map(function ($item) use ($familyLabels) {
                    $item->family = $familyLabels[$item->family] ?? $item->family;
                    return $item;
                });
            }

            return $storageFamilies;
        });
    }
}
