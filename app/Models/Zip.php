<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zip extends Model
{
    protected $table = 'zip';

    protected $fillable = [
        'zip',
        'lat',
        'lng',
        'city',
        'state_id',
        'state_name',
        'zcta',
        'parent_zcta',
        'population',
        'density',
        'county_fips',
        'county_name',
        'county_weights',
        'county_names_all',
        'county_fips_all',
        'imprecise',
        'military',
        'timezone'
    ];
}
