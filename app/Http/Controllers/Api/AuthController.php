<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        $user = auth('api')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            $user = auth('api')->user();
            $user->access_token = auth('api')->login($user);
            return api_response(new UserResource($user->load('country.image')), __('You have logged in successfully'), 1);
        }
        return api_response(null, __('Invalid credentials'), 1)->setStatusCode(401);
    }

    public function signup(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'country_id' => 'required|exists:countries,id',
            'name'       => 'required',
            'phone'      => 'required|unique:users,phone',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|confirmed|min:7|max:15'
        ]);
        if ($validation->fails()) {
            $data = $validation->errors()->first();
            return api_response(null, $data, 1)->setStatusCode(401);
        }
        $data = $request->except('password', 'name', 'type', 'status');
        $data['password'] = bcrypt($request->password);
        $data['status'] = 1;
        $data['type'] = 'client';
        $data['name']['ar'] = $request->name;
        $data['name']['en'] = $request->name;
        $user = User::create($data);
        $user->access_token = auth('api')->login($user);
        return api_response(new UserResource($user->load('country.image')), __('you have successfully registered'), 1);
    }

    public function forget_password(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return api_response(null, __('This user not found'), 0)->setStatusCode(401);
        }
        $code = rand(1000, 9999);
        $user->update(['code' => $code]);

        $userr = User::where('email', $request->email)->first();

        try {

            $mail = \Mail::to('yosraatef@gmail.com')->send(new \App\Mail\forgetPassMail($userr));
        } catch (\Throwable$th) {
            //$mail = throw $th;
        }

        //$message = __('Reset password code is : ') . $code;
        //send_sms($user->phone, $message);
        return api_response(['email' => $user->email, 'code' => $code], __("Reset password code sent to your phone"));
    }

    public function verifyCode(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'code'  => 'required'
        ]);
        $user = User::where('code', $request->code)->where('code', '!=', null)->where('email', $request->email)->first();
        if ($user) {
            return api_response(['email' => $user->email, 'code' => $user->code], __('Please enter your new password'));
        }
        return api_response(null, __('Invalid reset code'), 0)->setStatusCode(401);
    }


    public function resetPassword(Request $request)
    {
        $this->validate($request, [
           // 'code'     => 'required',
            'email'    => 'required',
            'password' => 'required|confirmed|min:7|max:15',
        ]);
        $user = User::where('code', '!=', null)->where('email', $request->email)->first();
        if (!$user) {
            return api_response(null, __('Code is invalid'))->setStatusCode(401);
        }
        $user->update(['password' => bcrypt($request->password), 'code' => null]);
        return api_response(null, __('Password changed successfully'));
    }
}

?>
