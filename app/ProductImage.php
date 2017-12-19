<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $talbe = 'product_images';
    protected $fillable = ['image','product_id'];
    public $timestamps = false;

    public function product(){
    	return $this->belongTo('App\Product');
    }
}
