<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function view_detail($alias, $id)
    {
        $product = Product::find($id);
        $category_id = $product->category->id;
        $supplier_id = $product->supplier->id;
        $product_related = Product::where('id', '!=', $id)
            ->where([
                ['category_id', '=', $category_id],
                ['supplier_id', '=', $supplier_id]
            ])
            ->inRandomOrder()
            ->limit(5)
            ->get();
        $more_image = json_decode($product->more_image);
        // $mycart = session()->get('cart');
        // $quantity = 1;
        // if (isset($mycart)) {
        //     if (isset($mycart[$id]))
        //         $quantity = $mycart[$id]['quantity'];
        // }
        return view(
            'Client.product.view_detail',
            compact(
                'product',
                'more_image',
                'product_related',
            )
        );
    }

    public function search_keyup_home(Request $request)
    {
        $name_search = $request->txtSearch;
        $model = DB::table('products')
            ->where('name', 'LIKE', '%' . $name_search . '%')
            ->select(
                'id',
                'name',
                'alias',
                'image'
            )
            ->get();
        return response()->json([
            'model' => $model,
            'status' => 1
        ]);
    }

    public function view_all_product(Request $request)
    {
        $model = DB::table('products')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select(
                'products.id',
                'products.name',
                'products.alias',
                'products.image',
                'products.price',
                'products.created_at',
                'products.promotion',
                'suppliers.name as supplier_name'
            );

        $min = $model->min('price');
        $max = $model->max('price');
        $min_current = $min;
        $max_current = $max;

        $page = $request->has('page') ? $request->page : 1;
        $size = $request->has('size') ? $request->size : 15;


        if ($request->has('search')) {
            $text = $request->search;
            $model = $model->where('products.name', 'LIKE', '%' . $text . '%');
        }

        if ($request->has('price')) {
            $price_range = $request->get('price');
            $price_range = explode('-', $price_range);
            $min_current = $price_range[0];
            $max_current = $price_range[1];
            $model = $model->whereBetween('price', $price_range);
        }

        if ($request->has('sort_by_price')) {
            $sort_by_price = $request->sort_by_price;
            $model = $model->orderBy('price', $sort_by_price);
        }

        if ($request->has('sort_by_date')) {
            $sort_by_date = $request->sort_by_date;
            $model = $model->orderBy('created_at', $sort_by_date);
        }

        $count_product = $model->count();
        $start = ($page - 1) * $size + 1;
        $tmp_end = $page * $size;
        $end = $tmp_end < $count_product ? $tmp_end : $count_product;

        $model = $model->paginate($size);

        return view('Client.product.shop', compact(
            'model',
            'count_product',
            'start',
            'end',
            'min',
            'max',
            'min_current',
            'max_current'
        ));
    }
}
