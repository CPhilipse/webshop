<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name', 'description', 'price', 'availability'];

    public function index () {
//        $product = Product::get($id);

    }

    public function products()
    {
        return $this->hasMany('App\Product','id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

