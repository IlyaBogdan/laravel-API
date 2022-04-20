<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = "cars";

    protected $attributes = [
        'employed' => false,
    ];
    
    protected $fillable = [
        'id',
        'title',
        'employed',
        'created_at',
        'updated_at'
    ];

}
