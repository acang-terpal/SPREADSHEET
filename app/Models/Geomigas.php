<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geomigas extends Model
{
    use HasFactory;

    protected $table = 'geomigas';
    protected $connection = 'pgsql_second';

    protected $fillable = [
        'name',
        'color',
        'stat',
        'area_sqkm',
        'capacity_oil',
        'capacity_gas',
        'resource_oil_p50',
        'resource_gas_p50',
        'resource_mnk_oil',
        'resource_mnk_gas',
        'geom'
    ];
}
