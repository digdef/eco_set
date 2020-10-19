<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'header_note',
        'img',
        'wiring_diagram',
        'technical_certificate',
        'price',
        'thumbnail',
        'description',
        'insert_depth',
        'reset_type',
        'modification',
        'type_of_drainage',
        'performance',
        'salvo_discharge',
        'electricity_consumption',
        'weight',
        'mounting',
        'dimensions',
        'sink',
        'bath',
        'toilet',
        'washer',
        'shower',
        'action',
        'new',
        'top',
        'advise',
        'category',
        'persons',
        'type_of_shell',
        'type_septic',
        'manufacturer',
        'elongate',
        'anchor',
        'equipment',
        'entrance_size',
        'useful_volume',
        'pinterest',
        'url',
        'meta_title',
        'meta_description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
