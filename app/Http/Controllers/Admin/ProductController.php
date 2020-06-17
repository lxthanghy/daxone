<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'products';
        $categories = DB::table('product_categories')->select('id', 'name')->get();
        $suppliers = DB::table('suppliers')->select('id', 'name')->get();
        $model = DB::table('products');
        $total_all_product = $model->count();
        $sort_by_quantity = "";
        $sort_by_price = "";
        $sort_by_created_at = "";
        $search_name = "";
        $page_size = 10;
        $supplier_id = "";
        $category_id = "";
        if ($request->has('sort_by_price')) {
            $sort_by_price = $request->sort_by_price;
            $model = $model->orderBy('price', $sort_by_price);
        }

        if ($request->has('sort_by_quantity')) {
            $sort_by_quantity = $request->sort_by_quantity;
            $model = $model->orderBy('quantity', $sort_by_quantity);
        }

        if ($request->has('sort_by_created_at')) {
            $sort_by_created_at = $request->sort_by_created_at;
            $model = $model->orderBy('created_at', $sort_by_created_at);
        }

        if ($request->has('search_name')) {
            $search_name = $request->search_name;
            $model = $model->where('name', 'LIKE', '%' . $search_name . '%');
        }

        if ($request->has('page_size')) {
            $page_size = $request->page_size;
        }

        if ($request->has('sl_supplier')) {
            $supplier_id = $request->sl_supplier;
            $model = $model->where('supplier_id', $supplier_id);
        }

        if ($request->has('sl_category')) {
            $category_id = $request->sl_category;
            $model = $model->where('category_id', $category_id);
        }
        $total = $model->count();
        $model = $model->select('id', 'name', 'image', 'price', 'quantity', 'status', 'home_flag');
        $model = $model->paginate($page_size);
        // $pro = Product::find(16);
        // dump($pro->orders->count());
        $orders = Order::all();
        $total_product_in_orders = 0;
        foreach ($orders as $order) {
            $total_product_in_orders += $order->products->count();
        }
        return view(
            'Admin.product.index',
            compact(
                'model',
                'title',
                'categories',
                'suppliers',
                'sort_by_quantity',
                'sort_by_price',
                'sort_by_created_at',
                'search_name',
                'page_size',
                'supplier_id',
                'category_id',
                'total',
                'total_all_product',
                'total_product_in_orders'
            )
        );
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'frame' => 'required',
            'rims' => 'required',
            'tires' => 'required',
            'weight' => 'required',
            'weight_limit' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'promotion' => 'numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ], [
            'name.required' => "Tên không được để trống",
            'image.required' => "Bạn phải chọn ảnh",
            'frame.required' => "Khung không được để trống",
            'rims.required' => "Vành không được để trống",
            'tires.required' => "Lốp không được để trống",
            'weight.required' => "Cân nặng không được để trống",
            'weight_limit.required' => "Tải trọng không được để trống",
            'price.required' => "Giá không được để trống",
            'price.numeric' => "Giá không hợp lệ",
            'price.min' => "Giá phải lớn hơn 0",
            'promotion.numeric' => "Khuyến mãi % không hợp lệ",
            'promotion.min' => "Khuyến mãi % phải lớn hơn 0",
            'promotion.max' => "Khuyến mãi % phải nhỏ hơn 100",
            'quantity.required' => "Số lượng không được để trống",
            'quantity.numeric' => "Số lượng không hợp lệ",
            'quantity.min' => "Số lượng phải lớn hơn 0",
            'category_id.required' => "Bạn chưa chọn loại",
            'supplier_id.required' => "Bạn chưa chọn nhà cung cấp"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $product = new Product();
            $product->name = trim($request->name);
            $product->alias = $request->alias;
            $product->description = trim($request->description);
            $product->image = $request->image;
            $product->more_image = $request->more_image;
            $product->frame = trim($request->frame);
            $product->rims = trim($request->rims);
            $product->tires = trim($request->tires);
            $product->weight = trim($request->weight);
            $product->weight_limit = trim($request->weight_limit);
            $product->price = $request->price;
            $product->promotion = $request->promotion;
            $product->quantity = $request->quantity;
            $product->category_id  = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->status = $request->status;
            $product->home_flag = $request->home_flag;
            $res = $product->save();
            return response()
                ->json([
                    'status' => $res
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $created_at = date('d/m/Y H:i:s A', strtotime($product->created_at));
        $updated_at = date('d/m/Y H:i:s A', strtotime($product->updated_at));
        $more_image = json_decode($product->more_image);
        $url = url('/');
        if ($more_image != null) {
            for ($i = 0; $i <  count($more_image); $i++) {
                $more_image[$i] = $url . $more_image[$i];
            }
        }
        return response()
            ->json([
                'obj' => $product,
                'image' => $url . $product->image,
                'more_image' => $more_image,
                'price' => number_format($product->price),
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'category_name' => $product->category->name,
                'supplier_name' => $product->supplier->name
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $more_image = json_decode($product->more_image);
        $url = url('/');
        if ($more_image != null) {
            for ($i = 0; $i <  count($more_image); $i++) {
                $more_image[$i] = $url . $more_image[$i];
            }
        }
        return response()->json([
            'obj' => $product,
            'image' => $url . $product->image,
            'more_image' => $more_image,
            'price' => floatval($product->price)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'frame' => 'required',
            'rims' => 'required',
            'tires' => 'required',
            'weight' => 'required',
            'weight_limit' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'promotion' => 'numeric|min:0|max:100',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required',
            'supplier_id' => 'required'
        ], [
            'name.required' => "Tên không được để trống",
            'image.required' => "Bạn phải chọn ảnh",
            'frame.required' => "Khung không được để trống",
            'rims.required' => "Vành không được để trống",
            'tires.required' => "Lốp không được để trống",
            'weight.required' => "Cân nặng không được để trống",
            'weight_limit.required' => "Tải trọng không được để trống",
            'price.required' => "Giá không được để trống",
            'price.numeric' => "Giá không hợp lệ",
            'price.min' => "Giá phải lớn hơn 0",
            'promotion.numeric' => "Khuyến mãi % không hợp lệ",
            'promotion.min' => "Khuyến mãi % phải lớn hơn 0",
            'promotion.max' => "Khuyến mãi % phải nhỏ hơn 100",
            'quantity.required' => "Số lượng không được để trống",
            'quantity.numeric' => "Số lượng không hợp lệ",
            'quantity.min' => "Số lượng phải lớn hơn 0",
            'category_id.required' => "Bạn chưa chọn loại",
            'supplier_id.required' => "Bạn chưa chọn nhà cung cấp"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $product = Product::find($id);
            $product->name = trim($request->name);
            $product->alias = $request->alias;
            $product->description = trim($request->description);
            $product->image = $request->image;
            $product->more_image = $request->more_image;
            $product->frame = trim($request->frame);
            $product->rims = trim($request->rims);
            $product->tires = trim($request->tires);
            $product->weight = trim($request->weight);
            $product->weight_limit = trim($request->weight_limit);
            $product->price = $request->price;
            $product->promotion = $request->promotion;
            $product->quantity = $request->quantity;
            $product->category_id  = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->status = $request->status;
            $product->home_flag = $request->home_flag;
            $res = $product->save();
            return response()
                ->json([
                    'status' => $res
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('products')->delete($id);
        return response()
            ->json([
                'status' => $res
            ]);
    }

    public function change_status($id)
    {
        $product = Product::find($id);
        $current_status = $product->status;
        $new_status = ($current_status + 1) % 2;
        $product->status = $new_status;
        $product->save();
        return redirect()->back();
    }

    public function change_home_flag($id)
    {
        $product = Product::find($id);
        $current_home_flag = $product->home_flag;
        $new_home_flag = ($current_home_flag + 1) % 2;
        $product->home_flag = $new_home_flag;
        $product->save();
        return redirect()->back();
    }
}
