<?php

namespace App\Services\Import\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

interface Importer
{
    /**
     * @param Updater $model
     * @return Importer
     */
    public function setUpdater(Updater $updater);

    /**
     * @param UploadedFile $file
     * @return Importer
     */
    public function setFile(UploadedFile $file);

    /**
     * Processed import
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function import();
}
