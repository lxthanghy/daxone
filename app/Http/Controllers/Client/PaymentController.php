<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;
use App\XML\XmlHelper;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('Client.payment.checkout');
    }

    public function payment(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->order_name = $request->first_name . $request->last_name;
        $order->order_address = $request->address_ship;
        $order->order_email = $request->order_email;
        $order->order_phone = $request->order_phone;
        $order->order_note = $request->order_note;
        $order->total_money = $request->total_price;
        $res = $order->save();
        $order_id = $order->id;
        $mycart = session()->get('cart');
        foreach ($mycart as $cart) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $cart['id'];
            $order_detail->quantity = $cart['quantity'];
            $order_detail->price = $cart['price'];
            $order_detail->save();
        }
        session()->forget('cart');
        return response()->json([
            'status' => $res
        ]);
    }

    public function load_province()
    {
        $xml = new XmlHelper('public/vietnam/Provinces_Data.xml');
        $provinces = $xml->load_province();
        return response()->json([
            'provinces' => $provinces,
            'status' => true
        ]);
    }

    public function load_district(Request $request)
    {
        $province_id = $request->province_id;
        $xml = new XmlHelper('public/vietnam/Provinces_Data.xml');
        $districts = $xml->load_district($province_id);
        return response()->json([
            'districts' => $districts,
            'status' => true
        ]);
    }

    public function load_precinct(Request $request)
    {
        $province_id = $request->province_id;
        $district_id = $request->district_id;
        $xml = new XmlHelper('public/vietnam/Provinces_Data.xml');
        $precincts = $xml->load_precinct($province_id, $district_id);
        return response()->json([
            'precincts' => $precincts,
            'status' => true
        ]);
    }

    public function generate_code(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_email' => 'required|email'
        ], [
            'order_email.required' => "Email không được để trống",
            'order_email.email' => "Email không hợp lệ"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $verification_code = "";
            $string_code = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $array_string_code = str_split($string_code);
            shuffle($array_string_code);
            $count = count($array_string_code);
            for ($i = 0; $i < 8; $i++)
                $verification_code .= $array_string_code[random_int(0, $count - 1)];
            return response()->json([
                'verification_code' => $verification_code,
                'status' => true
            ]);
        }
    }
}
