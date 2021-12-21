<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Traits\UploadFile;

class LoginController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        } else {
            return view('admin.user.login', ['title' => 'Trang Đăng Nhập Hệ Thống']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(
            [
                'email' => $email,
                'password' => $password,
                'active' => 1
            ],
            $remember
        )) {
            $admins = Auth::user();
            Session::put('admin_firstname', $admins->firstname);
            Session::put('admin_lastname', $admins->lastname);
            Session::put('admin_phone', $admins->phone);
            Session::put('admin_birthday', $admins->birthday);
            Session::put('admin_email', $admins->email);
            Session::put('admin_address', $admins->address);
            Session::put('admin_avatar', $admins->avatar);
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        return redirect()->back();
    }

    /**
     * Log out resources stored in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $firstname = $request -> firstname;
        $lastname = $request -> lastname;
        $phone = $request -> phone;
        $address = $request -> address;
        $birthday = $request -> birthday;

        $avatar = $this->storageUpload($request ,'avatar', 'adminavatar');
        

        $user = Auth::user();
        $user -> firstname = $firstname;
        $user -> lastname = $lastname;
        $user -> birthday = $birthday;
        $user -> phone = $phone;
        $user -> address = $address;
        if($avatar != null){
            $user -> avatar = $avatar['file_data'];
        }
        
        $user -> save();

        Session::flash('success',"Cập nhật thành công!");

        Session::put('admin_firstname', $user->firstname);
            Session::put('admin_lastname', $user->lastname);
            Session::put('admin_phone', $user->phone);
            Session::put('admin_birthday', $user->birthday);
            Session::put('admin_email', $user->email);
            Session::put('admin_address', $user->address);

            Session::put('admin_avatar', $user->avatar);
            return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
