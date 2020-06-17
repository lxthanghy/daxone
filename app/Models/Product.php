<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'alias', 
        'description', 
        'image', 
        'more_image', 
        'frame', 
        'rims', 
        'tires', 
        'weight', 
        'weight_limit', 
        'price', 
        'promotion', 
        'quantity', 
        'rating', 
        'category_id', 
        'supplier_id', 
        'status', 
        'home_flag', 
        'hot_flag', 
        'viewcount'
    ];

    //Một sản phẩm thuộc về 1 loại
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    //Một sản phẩm thuộc về 1 nhà cung cấp
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    //Một sản phẩm thuộc về nhiều đơn hàng
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }
}
