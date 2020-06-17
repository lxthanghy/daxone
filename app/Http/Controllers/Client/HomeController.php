<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $model = DB::table('products')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select(
                'products.id',
                'products.name',
                'products.alias',
                'products.image',
                'products.price',
                'products.promotion',
                'suppliers.name as supplier_name'
            )
            ->get();
        return view('Client.home.index', compact('model'));
    }
}
