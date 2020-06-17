<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_name',
        'order_address',
        'order_email',
        'order_phone',
        'order_note',
        'total_money',
        'payment_status'
    ];

    protected $status = [
        "0" => [
            'class' => "badge-default",
            'name' => "Chưa xác thực"
        ],
        "1" => [
            'class' => "badge-primary",
            'name' => "Chưa xác thực"
        ],
        "2" => [
            'class' => "badge-warning",
            'name' => "Chưa xác thực"
        ],
        "3" => [
            'class' => "badge-success",
            'name' => "Chưa xác thực"
        ],
        "-1" => [
            'class' => "badge-danger",
            'name' => "Đã huỷ"
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->payment_status);
    }

    //Một đơn hàng chứa nhiều sản phẩm
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
