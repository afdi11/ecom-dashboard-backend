<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $request){
        $product=new Product;
        $product->nama=$request->input('nama');
        $product->harga=$request->input('price');
        $product->deskripsi=$request->input('deskripsi');
        $product->file_path=$request->file('dokument')->store('products');
        $product->save();
        return $request->input();
    }
    function listProduct(){
        return Product::all();
    }
}