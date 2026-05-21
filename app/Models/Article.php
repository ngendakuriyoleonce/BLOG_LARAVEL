<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
   use HasFactory;
    public function Category(){
    return $this->belongsTo(Category::class);
}
 public function User(){
    return $this->belongsTo(User::class);
}
  protected $fillable = ['title', 'description', 'image','category_id','user_id'];
}
