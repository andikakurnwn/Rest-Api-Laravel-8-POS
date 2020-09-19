<?php

namespace App\Http\Controllers\Api\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{

    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactions = Transaction::all();
        $categories = Category::all();
        $customers = User::where('role_id', 3)->get();
        $ps = Product::all();
        $products = array();
        foreach($ps as $key=>$p){
            if($p->available_size == true){
                $products[$key] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('size_variations')
                ->with('categories')
                ->first();
            }else {
                $products[$key] = Product::where('id', $p->id)
                ->with('product_images')
                ->with('product_price')
                ->with('categories')
                ->first();
            }

            $key++;
        }

        $dashboard['transaction'] = $transactions;
        $dashboard['categories'] = $categories;
        $dashboard['customer'] = $customers;
        $dashboard['products'] = $products;


        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Carts :)',
                'data' => $dashboard

            ], $this->successStatus
        );

    }


}
