<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function login()
    {
        //Auth::guard('admin')->logout();
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function post_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:8'
        ], [
            'username.required' => "Tài khoản không được để trống",
            'password.required' => "Mật khẩu không được để trống",
            'password.min' => "Mật khẩu tối thiểu 8 ký tự"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $username = $request->username;
            $password = $request->password;
            $login = Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $request->has('remember'));
            return response()
                ->json([
                    'status' => $login
                ]);
        }
    }
    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'fullname.required' => "Họ tên không được để trống",
            'username.required' => "Tài khoản không được để trống",
            'username.unique' => "Tài khoản đã tồn tại",
            'password.required' => "Mật khẩu không được để trống",
            'password.min' => "Mật khẩu tối thiểu 8 ký tự",
            'confirm_password.required' => "Nhập lại mật khẩu không được để trống",
            'confirm_password.same' => "Nhập lại mật khẩu không chính xác",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $admin = new Admin();
            $admin->fullname = $request->fullname;
            $admin->username = $request->username;
            $admin->password = bcrypt($request->password);
            $res = $admin->save();
            return response()
                ->json([
                    'status' => $res
                ]);
        }
    }
}
