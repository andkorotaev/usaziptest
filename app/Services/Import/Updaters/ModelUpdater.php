<?php


namespace App\Services\Import\Updaters;


use App\Services\Import\Contracts\Updater;
use Illuminate\Database\Eloquent\Model;

abstract class ModelUpdater implements Updater
{
    protected $fields = [];

    protected $keyFields = [];

    protected $data = [];

    protected $errors = [];

    /**
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * Create or Update Model depending on key
     *
     * @param array $data
     * @return mixed|void
     */
    public function createOrUpdate(array $data)
    {
        $keyField = $this->getKey();

        $this->updateFields($data, $keyField);

        try {
            $this->getModel()->updateOrCreate(
                $this->keyFields,
                $this->data
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    /**
     * Mapping values and fields
     *
     * @param array $data
     * @param string $keyField
     */
    protected function updateFields(array $data, string $keyField)
    {
        foreach ($this->fields as $key => $field) {
            if ($field == $keyField) {
                $this->keyFields[$field] = $data[$key];
            } else {
                $this->data[$field] = $this->fixValue($data[$key]);
            }
        }
    }

    /**
     * ToDo: Need something do it with this crutch
     *
     * @param $value
     * @return int|null
     */
    protected function fixValue($value)
    {
        if ($value === 'TRUE') return 1;
        if ($value === 'FALSE') return 0;
        if ($value === '') return null;

        return  $value;
    }

    /**
     * Getting of model instance realization
     *
     * @return Model
     */
    protected abstract function getModel();

    /**
     * Getting of model unique key realization
     *
     * @return string
     */
    protected abstract function getKey();
}
