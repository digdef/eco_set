<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hints extends Model
{
    protected $table = 'hints';

    protected $primaryKey = 'id';

    protected $fillable = [
        'septic_type',
        'performance',
        'persons',
        'reset_type',
        'inset_depth',
        'modification',
        'type_of_drainage',
        'performance_prod',
        'salvo_discharge',
        'inset_depth_prod',
        'dimensions',
        'electricity_consumption',
        'weight',
        'mounting',
        'reset_type_prod'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
