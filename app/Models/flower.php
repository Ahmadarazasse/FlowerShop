<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flower extends Model
{
    use HasFactory;

    protected $table = 'flowers';
    public $primarykey = 'flowers_id';
    public $timestamps = true;
    
    protected $fillable = ['name' , 'detail' , 'image_url' , 'categorie' , 'price'];
}
