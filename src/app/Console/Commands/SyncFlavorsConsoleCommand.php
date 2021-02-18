<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class SyncFlavorsConsoleCommand extends Command
{
    protected $description = 'Sync flavors from AWS Bucket';
    protected $signature = 'sync:flavors';
    private const FLAVORS_FILE_NAME = 'flavors.json';

    public function handle()
    {
        try {
            $storage = Storage::disk('s3');
            if (!$storage->exists(self::FLAVORS_FILE_NAME)) {
                $this->info(self::FLAVORS_FILE_NAME . ' does not exist in bucket !');
                return;
            }

            $flavors = $storage->get(self::FLAVORS_FILE_NAME);
            $decodedData = json_decode($flavors, true);
            if (filled($decodedData)) {
                $this->saveToDatabase($decodedData);
                $this->info('Flavors synced successfully.');
                return;
            }
            $this->info('Can not decode json file.');
        } catch (FileNotFoundException $e) {
            dd($e->getMessage());
        }
    }

    private function saveToDatabase(array $decodedData)
    {
        dd($decodedData);
    }
}
