<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'description', 'price', 'availability'];

    public function index ($id) {
//        return Product::get($id);
    }

    public function products()
    {
        return $this->hasMany('App\Product','id');
    }

    public function product($id)
    {
        return Product::get($id);
    }
}

