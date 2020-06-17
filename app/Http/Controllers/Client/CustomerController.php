<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function login()
    {
        return view('Client.customer.login');
    }

    public function register()
    {
        return view('Client.customer.register');
    }

    public function post_login(Request $request)
    {
        $request_login = $request->only(
            'login_username',
            'login_password',
            'remember'
        );
        $validator = Validator::make(
            $request_login,
            [
                'login_username' => 'required',
                'login_password' => 'required|min:8'
            ],
            [
                'login_username.required' => "Tên tài khoản không được để trống",
                'login_password.required' => "Mật khẩu không được để trống",
                'login_password.min' => "Mật khẩu tối thiểu 8 ký tự"
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {

            $username = $request->login_username;
            $password = $request->login_password;
            $url =
            $login = Auth::guard('customer')->attempt(['username' => $username, 'password' => $password], $request->has('remember'));

            return response()
                ->json([
                    'status' => $login
                ]);
        }
    }

    public function post_register(Request $request)
    {
        $request_register = $request->only(
            'res_username',
            'res_password',
            'res_confirm_password',
            'res_name',
            'res_address',
            'res_email',
            'res_phone',
            'res_gender',
            'res_date_of_birth'
        );

        $validator = Validator::make(
            $request_register,
            [
                'res_username' => 'required|unique:customers,username',
                'res_password' => 'required|min:8',
                'res_confirm_password' => 'required|same:res_password',
                'res_name' => 'required',
                'res_address' => 'required',
                'res_email' => 'required|email|unique:customers,email',
                'res_phone' => 'required|unique:customers,phone',
                'res_date_of_birth' => 'required',
            ],
            [
                'res_username.required' => "Tên tài khoản không được để trống",
                'res_username.unique' => "Tên tài khoản đã tồn tại",
                'res_password.required' => "Mật khẩu không được để trống",
                'res_password.min' => "Mật khẩu ít nhất 8 ký tự",
                'res_confirm_password.required' => "Nhập lại mật khẩu không được để trống",
                'res_confirm_password.same' => "Nhập lại mật không chính xác",
                'res_name.required' => "Họ tên không được để trống",
                'res_address.required' => "Địa chỉ không được để trống",
                'res_email.required' => "Email không được để trống",
                'res_email.email' => "Email không hợp lệ",
                'res_email.unique' => "Email đã tồn tại",
                'res_phone.required' => "Điện thoại không được để trống",
                'res_phone.unique' => "Điện thoại đã tồn tại",
                'res_date_of_birth.required' => "Ngày sinh không được để trống",
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $customer = new Customer();
            $customer->username = trim($request->res_username);
            $customer->password = bcrypt($request->res_password);
            $customer->name = trim($request->res_name);
            $customer->address = trim($request->res_address);
            $customer->email = trim($request->res_email);
            $customer->phone = trim($request->res_phone);
            if ($request->res_gender != "")
                $customer->gender = $request->res_gender;
            $customer->date_of_birth = $request->res_date_of_birth;
            $res = $customer->save();
            return response()
                ->json([
                    'status' => $res
                ]);
        }
    }

    public function my_account(Request $request)
    {
        $id_customer = Auth::guard('customer')->user()->id;
        // $customer = Customer::find($id_customer);
        // dump($customer);
        $orders = Order::where('customer_id', $id_customer)->get();
        return view('Client.customer.my_account', compact('orders'));
    }

    public function logout_customer()
    {
        Auth::guard('customer')->logout();
        return response()->json([
            'status' => true
        ]);
    }
}
