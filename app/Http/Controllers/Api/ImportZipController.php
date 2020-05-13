<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Services\Import\ImportZip;

class ImportZipController extends ApiController
{
    /**
     * @param Request $request
     * @param ImportZip $importer
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(Request $request, ImportZip $importer)
    {
        $request->validate([
            'import_file' => 'required|file',
        ]);

        $file = $request->file('import_file');

        return $importer->import($file);
    }
}
