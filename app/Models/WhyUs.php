<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $table = 'why_us';

    protected $primaryKey = 'id';

    protected $fillable = [
        'description1',
        'description2',
        'description3',
        'description4'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
