<?php


namespace App\Services\Import\Importers;

use Illuminate\Support\Facades\Storage;

class CsvImproter extends Importer
{
    /**
     * @inheritDoc
     */
    protected function run()
    {
        $fileName = Storage::path($this->path);

        $file = fopen($fileName, 'r');

        $this->updater->setFields(fgetcsv($file));

        $lineNumber = 1;
        while ($line = fgetcsv($file)) {
            try {
                $this->updater->createOrUpdate($line);
            } catch (\Exception $e) {
                $this->errors[] = 'Error in line ' . $lineNumber . ': ' . $e->getMessage();
            }

            $lineNumber++;
        }

        fclose($file);
    }
}
