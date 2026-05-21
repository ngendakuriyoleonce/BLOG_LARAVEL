<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Laravel\Boost\Console\UpdateCommand;

class ProductController extends Controller
{
   public function index(){
   $products=Product::find(1);
   $products->delete();
    return  $products;
   

   }
}
