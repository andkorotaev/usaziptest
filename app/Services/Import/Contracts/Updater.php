<?php

namespace App\Services\Import\Contracts;

interface Updater
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data);

    /**
     * Set fields of model
     *
     * @param array $fields
     */
    public function setFields(array $fields);
}
