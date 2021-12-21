<?php

namespace App\Http\Controllers\Client\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function store(UserFormRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('customer')->attempt($arr)) {
            $user = Customer::select('firstname', 'lastname', 'email', 'address', 'phone')->where('active', 1)->where('email', $request->input('email'))->get();
            Session::put('firstname_client', $user[0]->firstname);
            Session::put('lastname_client',  $user[0]->lastname );
            Session::put('email_client', $user[0]->email);
            Session::put('address_client', $user[0]->address);
            Session::put('phone_client', $user[0]->phone);
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng');
            return redirect()->back();
        }
    }
}
