<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public $successStatus = 200;

    public function index()
    {

        $ps = Product::all();
        $products = array();
        foreach($ps as $key=>$p){
            if($p->available_size == true){
                $products[$key+1] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('size_variations')
                ->first();
            }else {
                $products[$key+1] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('product_price')
                ->first();
            }
        }

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Products :)',
                'data' => $products

            ], $this->successStatus
        );
    }

    public function detail($id)
    {
        $ps = Product::find($id);
        if($ps->available_size == true){
            $product = Product::where('id', $ps->id)
            ->with('product_images')
            ->with('size_variations')
            ->first();
        }else {
            $product = Product::where('id', $ps->id)
            ->with('product_images')
            ->with('product_price')
            ->first();
        }


        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Product :)',
                'data' => $product
            ], $this->successStatus
        );
    }

    public function productByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $ps = $category->products()->get();
        $products = array();
        foreach($ps as $key=>$p){
            if($p->available_size == true){
                $products[$key+1] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('size_variations')
                ->first();
            }else {
                $products[$key+1] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('product_price')
                ->first();
            }
        }
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Products by category :)',
                'data' => $products

            ], $this->successStatus
        );
    }

}
