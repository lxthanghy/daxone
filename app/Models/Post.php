<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 
        'alias', 
        'category_id',
        'content', 
        'status', 
        'viewcount'
    ];
}
