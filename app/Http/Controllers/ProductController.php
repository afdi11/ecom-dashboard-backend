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
    function deleteProduct($id){
        // $result=Product::where('id',$id)->first();
        $result=Product::where('id',$id)->delete();
        if($result){
            return ["Result"=>"Product telah berhasil dihapus"];
        }else{
            return ["Result"=>"Operation Failed"];
        }
    }
    function getProduct($id){
        return Product::find($id);
    }
    function updateProduct($id,Request $request){
        $product=Product::find($id);
        if($request->input('nama')){
            $product->Nama=$request->input('nama');
        }
        if($request->input('price')){
            $product->Harga=$request->input('price');
        }
        if($request->input('deskripsi')){
            $product->Deskripsi=$request->input('deskripsi');
        }
        if($request->file('dokument')){
            $product->File_path=$request->file('dokument')->store('products');
        }
        $product->save();
        $product=Product::find($id);
        return $product;
    }
    function search($key){
        return Product::where('nama','like',"%$key%")->get();
    }
}