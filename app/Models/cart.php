<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    public $primarykey = 'carts_id';
    public $timestamps = true;

    protected $fillable = ['flower_id' , 'user_email' ,'quantity' ];
}
