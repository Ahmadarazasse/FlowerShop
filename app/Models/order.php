<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['location' , 'phone' , 'total' , 'items_id',  'quantity' ];

    protected $casts = [
        'items_id' => 'array'
        ];
    use HasFactory;
}
