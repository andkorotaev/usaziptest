<?php


namespace App\Services\Import\Updaters;

use App\Models\Zip;

class ZipUpdater extends ModelUpdater
{
    /**
     * @inheritDoc
     */
    protected function getModel()
    {
       return new Zip();
    }

    /**
     * @inheritDoc
     */
    protected function getKey()
    {
        return 'zip';
    }
}
