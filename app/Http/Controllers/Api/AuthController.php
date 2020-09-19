<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request)
    {

        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $user['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(
                [
                    'status' => 'Success',
                    'message' => 'Successfully to Login :)',
                    'data' => $user
                ],

                $this->successStatus
            );
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $date = Carbon::now()->toDateString();
        $currentDate = explode('-', $date);

        $user = new User();
        $user->username = 'CSTE' . $currentDate[0].$currentDate[1].$currentDate[2] . '0003';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user['token'] =  $user->createToken('nApp')->accessToken;

        return response()->json(
            [
                'status' => 'Success',
                'message' => 'Successfully Added new Customer :)',
                'data' => $user,
            ],

            $this->successStatus
        );
    }

}
