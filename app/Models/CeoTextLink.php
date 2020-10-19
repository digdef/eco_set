<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CeoTextLink extends Model
{
    protected $table = 'ceo_text_links';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'link',
        'id_ceo'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
