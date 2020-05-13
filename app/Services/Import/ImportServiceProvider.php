<?php

namespace App\Services\Import;

use App\Services\Import\Importers\CsvImproter;
use App\Services\Import\Updaters\ZipUpdater;
use Illuminate\Support\ServiceProvider;

class ImportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Import\ImportZip', function ($app) {
            return new ImportZip(
                new CsvImproter(),
                new ZipUpdater()
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
