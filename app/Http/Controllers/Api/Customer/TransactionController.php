<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;

class TransactionController extends Controller
{
    public $successStatus = 200;

    public function history()
    {
        $transactions = Auth::guard('api')->user()->transactions()->where('status', '1')->get();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Transactions :)',
                'data' => $transactions

            ], $this->successStatus
        );
    }

    public function pendingTransaction()
    {
        $transactions = Auth::guard('api')->user()->transactions()->where('status', '0')->get();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Pending Transactions :)',
                'data' => $transactions

            ], $this->successStatus
        );
    }

    public function checkOut(Request $request)
    {

        $this->validate($request, [
            'cart' => 'required',
        ]);

        if(Auth::guard('api')->user()->address === null && Auth::guard('api')->user()->telephone === null){

            return response(
                [
                    'status' => 'Failed',
                    'message' => 'User Address or Telephone Not Found Please Update your Profile !!',

                ], $this->successStatus
            );

        }

        $cart = $request->cart;
        $products = array();

        for($i = 0 ; $i < count($cart); $i++){

            if(Product::find($cart[$i]['product_id'])->available_size == true){
                $products[$i] = Product::where('id', $cart[$i]['product_id'])
                ->with('product_images')
                ->with('size_variations')
                ->with('categories')
                ->first();

                $products[$i]['notes'] = $cart[$i]['notes'];
                $products[$i]['kuantitas'] = $cart[$i]['kuantitas'];
                $products[$i]['subtotal'] = $cart[$i]['subtotal'];

            }else {
                $products[$i] = Product::where('id', $cart[$i]['product_id'])
                ->with('product_images')
                ->with('product_price')
                ->with('categories')
                ->first();

                $products[$i]['notes'] = $cart[$i]['notes'];
                $products[$i]['kuantitas'] = $cart[$i]['kuantitas'];
                $products[$i]['subtotal'] = $cart[$i]['subtotal'];

            }

        }


        $data = Auth::guard('api')->user();
        $data['products'] = $products;
        $subtotal = 0;
        for($i = 0; $i < count($cart); $i++){
            $subtotal = $subtotal + $cart[$i]['subtotal'];
        }
        $data['subtotal'] =  $subtotal;
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load CheckOut :)',
                'data' => $data

            ], $this->successStatus
        );


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cart' => 'required',
            'subtotal' => 'required'
        ]);

        $cart = $request->cart;
        $transaction = new Transaction();

        $date = Carbon::now()->toDateString();
        $currentDate = explode('-', $date);
        $noTransaction = "INV" . $currentDate[0].$currentDate[2].$currentDate[1]. substr(Auth::guard('api')->user()->username, -3);
        $transaction->no_transaction = $noTransaction;
        $transaction->user_id = Auth::guard('api')->user()->id;

        $transaction->subtotal = $request->subtotal;
        $transaction->save();

        for($i = 0; $i < count($cart); $i++){

            $transactionDetail = new TransactionDetail();
            $transactionDetail->no_transaction = $transaction->no_transaction;
            $transactionDetail->product_id = $cart[$i]['product_id'];
            $transactionDetail->notes = $cart[$i]['notes'];
            $transactionDetail->kuantitas = $cart[$i]['kuantitas'];
            $transactionDetail->subtotal = $cart[$i]['subtotal'];
            $transactionDetail->save();

        }

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to make Transactions :)',

            ], $this->successStatus
        );

    }
}
