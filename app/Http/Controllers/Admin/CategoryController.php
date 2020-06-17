<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Else_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = DB::table('product_categories')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $title = 'product_categories';
        return view('Admin.category.index', compact('model', 'title'));
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
    public function change_status($id)
    {
        $category = ProductCategory::find($id);
        $current_status = $category->status;
        $new_status = ($current_status + 1) % 2;
        $category->status = $new_status;
        $category->save();
        return redirect()->back();
    }

    public function change_home_flag($id)
    {
        $category = ProductCategory::find($id);
        $current_home_flag = $category->home_flag;
        $new_home_flag = ($current_home_flag + 1) % 2;
        $category->home_flag = $new_home_flag;
        $category->save();
        return redirect()->back();
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
            'name' => 'required'
        ], [
            'name.required' => "Tên không được để trống"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $category = new ProductCategory();
            $category->name = trim($request->name);
            $category->alias = trim($request->alias);
            $category->description = trim($request->description);
            $category->status = $request->status;
            $category->home_flag = $request->home_flag;
            $res = $category->save();
            return response()->json(['status' => $res]);
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
        $category = ProductCategory::find($id);
        $created_at = date('d/m/Y H:i:s A', strtotime($category->created_at));
        $updated_at = date('d/m/Y H:i:s A', strtotime($category->updated_at));
        return response()
            ->json([
                'obj' => $category,
                'created_at' => $created_at,
                'updated_at' => $updated_at
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
        $category = ProductCategory::find($id);
        return response()
            ->json([
                'obj' => $category
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
        ], [
            'name.required' => "Tên không được để trống",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $category = ProductCategory::find($id);
            $category->name = trim($request->name);
            $category->alias = trim($request->alias);
            $category->description = trim($request->description);
            $category->status = $request->status;
            $category->home_flag = $request->home_flag;
            $res = $category->save();
            return response()->json(['status' => $res]);
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
        $res = DB::table('product_categories')->delete($id);
        return response()->json(['status' => $res]);
    }
}
