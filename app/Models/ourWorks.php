<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ourWorks extends Model
{
    protected $table = 'our_works';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'img',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
