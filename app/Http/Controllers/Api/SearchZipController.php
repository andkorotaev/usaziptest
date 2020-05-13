<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Zip;
use App\Services\SearchZip\SearchZip;
use Illuminate\Http\Request;

class SearchZipController extends ApiController
{
    /**
     * @param Request $request
     * @param SearchZip $search
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchByZip(Request $request, SearchZip $search)
    {
        $request->validate([
            'zip' => 'required',
        ]);

        $zip = $request->zip;

        return response()->json($search->searchByZip($zip));
    }

    /**
     * @param Request $request
     * @param SearchZip $search
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchByCity(Request $request, SearchZip $search)
    {
        $request->validate([
            'city' => 'required|min:2',
        ]);

        $city = $request->city;

        return response()->json($search->searchByCity($city));
    }
}
