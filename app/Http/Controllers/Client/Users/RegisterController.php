<?php

namespace App\Http\Controllers\Client\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect('/');
    }

    public function store(CreateUserFormRequest $request)
    {
        if ($request->input('checked') == 'on') {
            $check = 1;
        } else {
            $check = 0;
        }
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date =  date_default_timezone_get();
            if (!Customer::where('email', '=', $request->input('email'))->count() > 0) {
                Customer::create([
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'active' => 1,
                    'level' => 0,
                    'checked' => $check,
                    'created_at' =>  $date,
                    'updated_at' =>  $date
                ]);

                $user = Customer::select('firstname', 'lastname', 'id', 'email')->where('email', $request->input('email'))->first();
                Session::put('firstname_client', $user->firstname);
                Session::put('lastname_client',  $user->lastname );
                Session::put('email_client', $user->email);
                Session::put('address_client', $user->address);
                Session::put('phone_client', $user->phone);
                return redirect()->route('home');
            } else {
                Session::flash('error', 'Tài khoản đã tồn tại');
                return redirect()->back();
            }
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo Tài Khoản Lỗi: ' . $err->getMessage());
            return redirect()->back();
        }
    }
}
