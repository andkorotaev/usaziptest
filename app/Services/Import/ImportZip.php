<?php


namespace App\Services\Import;


use App\Services\Import\Contracts\Importer;
use App\Services\Import\Contracts\Updater;
use Illuminate\Http\UploadedFile;

class ImportZip
{
    private $importer;
    private $updater;

    /**
     * ImportZip constructor.
     *
     * @param Importer $importer
     * @param Updater $updater
     */
    public function __construct(Importer $importer, Updater $updater)
    {
        $this->importer = $importer;
        $this->updater = $updater;
    }

    /**
     * @param UploadedFile $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(UploadedFile $file)
    {
        return $this
            ->importer
            ->setFile($file)
            ->setUpdater($this->updater)
            ->import();
    }


}
