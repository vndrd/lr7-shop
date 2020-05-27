<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function show($slug)
    {
        if(Product::where('slug',$slug)->first())
            return "Slug existe";
        return "Slug Disponible";
        //
    }
}
