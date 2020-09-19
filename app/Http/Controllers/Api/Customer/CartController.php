<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductPrice;
use App\Models\SizeVariation;

class CartController extends Controller
{

    public $successStatus = 200;

    public function index()
    {

        $myCart = Cart::where('user_id', Auth::guard('api')->user()->id)->get();

        $products = array();
        foreach($myCart as $key=>$p){
            if($p->product->available_size == true){
                $products[$key] = Product::where('id', $p->product_id)
                ->with('product_images')
                ->with('size_variations')
                ->with('categories')
                ->first();

                $products[$key]['notes'] = $p->notes;
                $products[$key]['kuantitas'] = $p->kuantitas;
                $products[$key]['subtotal'] = $p->subtotal;

            }else {
                $products[$key] = Product::where('id', $p->product_id)
                ->with('product_images')
                ->with('product_price')
                ->with('categories')
                ->first();

                $products[$key]['notes'] = $p->notes;
                $products[$key]['kuantitas'] = $p->kuantitas;
                $products[$key]['subtotal'] = $p->subtotal;

            }

            $key++;
        };



        $subtotal = 0;
        foreach($myCart as $cart){
            $subtotal = $subtotal + $cart->subtotal;
        }

        $p = array();
        $p = $products;
        $p['subtotal'] = $subtotal;

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Carts :)',
                'data' => $p

            ], $this->successStatus
        );
    }

    public function store(Request $request){

        $this->validate($request, [
            'product_id' => 'required',
            'notes' => 'nullable',
            'kuantitas' => 'required'
        ]);

        $myCart = Cart::where('product_id', '=' , $request->product_id)->first();
        $product = Product::find($request->product_id);

        if($myCart !== null && $myCart->variations === $request->variations){

            $myCart->kuantitas = $myCart->kuantitas + 1;
            $myCart->subtotal = ( $myCart->subtotal / ( $myCart->kuantitas - 1 )) * $myCart->kuantitas;
            $myCart->save();

            return response(
                [
                    'status' => 'Success',
                    'message' => 'Successfully to Added Item Carts :)',

                ], $this->successStatus
            );

        }

        $cart = new Cart();
        $cart->user_id = Auth::guard('api')->user()->id;
        $cart->product_id = $product->id;
        if($product->available_size == true){

            $product->variations = "Ukuran : " . $request->variations;

        }

        $cart->kuantitas = $request->kuantitas;

        $productPrice = ProductPrice::where('product_id', $product->id)->first();
        $cart->subtotal = $productPrice->price * $request->kuantitas;
        $cart->save();

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Added Item Carts :)',

            ], $this->successStatus
        );

    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Deleted Cart :)',

            ], $this->successStatus
        );


    }


}
