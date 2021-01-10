<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','product_detail', 'price', 'product_pic','t_userupdate','t_ipaddress', 'created_at','updated_at'
    ];

    public $timestamps = true;
}
