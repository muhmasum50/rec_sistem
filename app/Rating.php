<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'id_product','id_user', 'rating', 't_userupdate','created_at','updated_at'
    ];

    public $timestamps = true;
}
