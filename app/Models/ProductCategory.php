<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 
        'alias', 
        'description', 
        'parent_id', 
        'status', 
        'home_flag'
    ];

    //Một loại sản phẩm có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    
    public function supplier_name()
    {
        $supplier_name = DB::table('products')
            ->where('category_id', $this->id)
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->where('suppliers.status', '=', 1)
            ->select('suppliers.name')
            ->groupBy('suppliers.name')
            ->get();
        return $supplier_name;
    }
}
