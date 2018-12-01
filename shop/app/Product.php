<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ="products";
    public function product_type() {
    	return $this->belongTo('App\ProductType','id_type','id');
    	//belongto 1 sản phẩm thuộc về 1 loại sản phẩm, lấy id_type(id loại làm khóa ngoại)
    }
    public function bill_detail() {
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
