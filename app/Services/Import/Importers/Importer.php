<?php


namespace App\Services\Import\Importers;

use App\Services\Import\Contracts\Updater;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Services\Import\Contracts\Importer as ImporterInterface;

abstract class Importer implements ImporterInterface
{
    protected $file;
    protected $path;

    protected $errors = [];

    protected $updater;

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        $this->storeFile();

        return $this;
    }

    /**
     * @param Updater $updater
     * @return ImporterInterface|void
     */
    public function setUpdater(Updater $updater)
    {
        $this->updater = $updater;

        return $this;
    }

    /**
     * Processed import
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function import()
    {
        try {
            $this->run();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $this->getResponse();
    }

    /**
     * Run import process.
     * Abstract method. Need implementation.
     *
     * @return mixed
     */
    abstract protected function run();

    /**
     * Load file to storage
     */
    protected function storeFile()
    {
        $this->path = $this->file->storeAs(
            'import_files',
            $this->file->getClientOriginalName()
        );
    }

    /**
     * Delete file from storage
     */
    protected function deleteFile()
    {
        Storage::delete($this->path);
    }

    /**
     * Return success or errors response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getResponse()
    {
        if ($this->errors) {
            return response()->json([
                'error' => true,
                'errors' => $this->errors
            ], 200);
        } else {
            return response()->json([
                'success' => true,
            ], 200);
        }
    }

    /**
     * Delete file from store
     */
    function __destruct()
    {
        $this->deleteFile();
    }
}
