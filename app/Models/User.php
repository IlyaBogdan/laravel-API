<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    protected $attributes = [
        'car_id' => null,
    ];
    
    protected $fillable = [
        'id',
        'name',
        'surname',
        'car_id',
        'created_at',
        'updated_at'
    ];

}
