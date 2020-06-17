<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = DB::table('suppliers')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $title = 'suppliers';
        return view('Admin.supplier.index', compact('model', 'title'));
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
            'address' => 'required',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required|unique:suppliers'
        ], [
            'name.required' => "Tên không được để trống",
            'address.required' => "Địa chỉ không được để trống",
            'email.required' => "Email không được để trống",
            'email.email' => "Email không hợp lệ",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Điện thoại không được để trống",
            'phone.unique' => "Điện thoại đã tồn tại",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $supplier = new Supplier();
            $supplier->name = trim($request->name);
            $supplier->address = trim($request->address);
            $supplier->email = trim($request->email);
            $supplier->phone = trim($request->phone);
            $supplier->status = trim($request->status);
            $res = $supplier->save();
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
        $supplier = Supplier::find($id);
        $created_at = date('d/m/Y H:i:s A', strtotime($supplier->created_at));
        $updated_at = date('d/m/Y H:i:s A', strtotime($supplier->updated_at));
        return response()
            ->json([
                'obj' => $supplier,
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
        $supplier = Supplier::find($id);
        return response()
            ->json([
                'obj' => $supplier
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
            'address' => 'required',
            'email' => "required|email|unique:suppliers,id",
            'phone' => "required|unique:suppliers,id"
        ], [
            'name.required' => "Tên không được để trống",
            'address.required' => "Địa chỉ không được để trống",
            'email.required' => "Email không được để trống",
            'email.email' => "Email không hợp lệ",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Điện thoại không được để trống",
            'phone.unique' => "Điện thoại đã tồn tại"
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $supplier = Supplier::find($id);
            $supplier->name = trim($request->name);
            $supplier->address = trim($request->address);
            $supplier->email = trim($request->email);
            $supplier->phone = trim($request->phone);
            $supplier->status = trim($request->status);
            $res = $supplier->save();
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
        $res = DB::table('suppliers')
            ->delete($id);
        return response()
            ->json([
                'status' => $res
            ]);
    }

    public function change_status($id)
    {
        $supplier = Supplier::find($id);
        $current_status = $supplier->status;
        $new_status = ($current_status + 1) % 2;
        $supplier->status = $new_status;
        $supplier->save();
        return redirect()->back();
    }
}
