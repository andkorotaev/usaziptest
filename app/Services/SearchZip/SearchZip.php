<?php


namespace App\Services\SearchZip;


use App\Models\Zip;
use Illuminate\Database\Eloquent\Collection;

class SearchZip
{
    protected $model;

    public function __construct()
    {
        $this->model = new Zip();
    }

    /**
     * @param string $zip
     * @return Collection
     */
    public function searchByZip(string $zip)
    {
        return $this
            ->getQuery()
            ->where('zip', $zip)
            ->get();
    }

    /**
     * @param string $city
     * @return Collection
     */
    public function searchByCity(string $city)
    {
        return $this
            ->getQuery()
            ->where('city', 'like', '%' . $city . '%')->get();
    }

    /**
     * Get basic query
     *
     * @return Zip
     */
    protected function getQuery()
    {
        return $this->model;
    }
}
