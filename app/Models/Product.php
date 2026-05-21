<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','category','description','sulg','price','quantity'];
    protected $guarded = ['id'];
}
