<?php

namespace App\Http\Controllers\Api\Cashier;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;;

class SettingController extends Controller
{
    public $successStatus = 200;

    public function profile()
    {

        $user = Auth::guard('api')->user();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load User :)',
                'data' => $user

            ], $this->successStatus
        );

    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
            'telephone' => 'required',
            'address' => 'required',
            'about' => 'nullable'
        ]);

        $user = User::findOrFail(Auth::guard('api')->user()->id);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }
            // Delete old image form profile folder
            if (Storage::disk('public')->exists('profile/'.$user->image))
            {
                Storage::disk('public')->delete('profile/'.$user->image);
            }
            $profile = Image::make($image)->resize(500,500)->save();
            Storage::disk('public')->put('profile/'.$imageName,$profile);
        } else {
            $imageName = $user->image;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->telephone = $request->telephone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->save();

        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Updated User :)',

            ], $this->successStatus
        );


    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'c_password' => 'required|same'
        ]);

        $hashedPassword = Auth::guard('api')->user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){

            if(!Hash::check($request->password, $hashedPassword)){

                $user = User::find(Auth::guard('api')->user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                return response(
                    [
                        'status' => 'Success',
                        'message' => 'Successfully to Updated Password User :)',

                    ], $this->successStatus
                );

            }else {

                return response(
                    [
                        'status' => 'Failed',
                        'message' => 'New Password cannot be the same as old password !!',

                    ], $this->successStatus
                );

            }

        }else {

            return response(
                [
                    'status' => 'Failed',
                    'message' => 'Current password not match !!',

                ], $this->successStatus
            );

        }

    }
}
