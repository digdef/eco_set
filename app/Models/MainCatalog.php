<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCatalog extends Model
{
    protected $table = 'main_catalog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product',
        'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
