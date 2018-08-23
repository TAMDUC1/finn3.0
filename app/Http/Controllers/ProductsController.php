<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Products as ProductResource;
use App\Products;

class ProductsController extends Controller
{
    public function show ($id)
    {
        return new ProductResource(Products::find($id));
    }
    public function getUpload(){
        return view('admin.Products.upload');
    }
    public function postUpload(Request $request) {
        //dd('sdfssdfsdg');
        $product = $this->validate(
            request(),
            [
                'name' => 'required',
                'content' => 'required',
                'price' => 'required',
                'image' => 'required',
                'slug' => 'required',
                'status' => 'required',
                'amount' => 'required',
            ]
        );
        dd($product);
        Products::create($product);

    }

}
