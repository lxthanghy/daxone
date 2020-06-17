<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'email', 
        'phone', 
        'status'
    ];

    //Một nhà cung cấp có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
}
