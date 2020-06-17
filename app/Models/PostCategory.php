<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'name', 
        'alias', 
        'description', 
        'parent_id', 
        'status', 
        'home_flag'
    ];
}
