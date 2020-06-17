<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{
    public function add_to_cart($id, $quantity)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->select(
                'id',
                'name',
                'image',
                'alias',
                'promotion',
                'price',
                'quantity'
            )
            ->first();
        if ($quantity <= $product->quantity) {
            $quantity = (int) $quantity;
            $price_pro = $product->price;
            $promotion = $product->promotion;
            $price_pro_cart = 0;
            if ($promotion > 0)
                $price_pro_cart = ($price_pro * ((100 - $promotion) / 100));
            else
                $price_pro_cart = $price_pro;
            $mycart = session()->get('cart');
            if (isset($mycart[$id])) {
                if ($quantity + $mycart[$id]['quantity'] <= $product->quantity)
                    $mycart[$id]['quantity'] += $quantity;
                else {
                    return response()->json([
                        'status' => 1
                    ]);
                }
            } else {
                $mycart[$id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'alias' => $product->alias,
                    'image' => $product->image,
                    'price' => $price_pro_cart,
                    'price_format' => number_format($price_pro_cart),
                    'quantity' => $quantity
                ];
            }
            session()->put('cart', $mycart);
            $mycart = session()->get('cart');
            $count_cart = count($mycart);
            $html_cart = view('Client.cart.cart_component', [
                'count' => $count_cart,
                'carts' => $mycart
            ])->render();
            return response()->json([
                'html_cart' => $html_cart,
                'count' => $count_cart,
                'status' => 0
            ]);
        } else {
            return response()->json([
                'status' => 1
            ]);
        }
    }

    public function view_cart()
    {
        return view('Client.cart.view_cart');
    }

    public function update_cart(Request $request, $id)
    {
        $quantity =  (int) $request->quantity;
        $product = DB::table('products')
            ->where('id', $id)
            ->select('quantity')
            ->first();
        if ($quantity <= $product->quantity) {
            $mycart = session()->get('cart');
            $mycart[$id]['quantity'] = $quantity;
            session()->put('cart', $mycart);
            $mycart = session()->get('cart');
            $count_cart = count($mycart);
            $html_cart = view('Client.cart.cart_component', [
                'count' => $count_cart,
                'carts' => $mycart
            ])->render();
            $cart_list = view('Client.cart.cart_list', [
                'count' => $count_cart,
                'mycart' => $mycart
            ])->render();
            return response()->json([
                'html_cart' => $html_cart,
                'cart_list' => $cart_list,
                'count' => $count_cart,
                'status' => 1
            ]);
        } else {
            return response()->json([
                'status' => 0
            ]);
        }
    }

    public function delete_cart($id)
    {
        $mycart = session()->get('cart');
        unset($mycart[$id]);
        session()->put('cart', $mycart);
        $mycart = session()->get('cart');
        $count_cart = count($mycart);
        $html_cart = view('Client.cart.cart_component', [
            'count' => $count_cart,
            'carts' => $mycart
        ])->render();
        $cart_list = view('Client.cart.cart_list', [
            'count' => $count_cart,
            'mycart' => $mycart
        ])->render();
        return response()->json([
            'html_cart' => $html_cart,
            'cart_list' => $cart_list,
            'count' => $count_cart,
            'status' => 1
        ]);
    }

    public function clear_cart()
    {
        session()->forget('cart');
        $html_cart = view('Client.cart.cart_component', [
            'count' => 0,
            'carts' => null
        ])->render();
        $cart_list = view('Client.cart.cart_list', [
            'count' => 0,
            'mycart' => null
        ])->render();
        return response()->json([
            'html_cart' => $html_cart,
            'cart_list' => $cart_list,
            'count' => 0,
            'status' => 1
        ]);
    }
}
