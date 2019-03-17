<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
   	public $timestamps = false;

   	public function product_type(){
   		return $this->belongsTo("App\Product","id_type","id");//id de products
   	}

   	public function bill_detail(){
   		return $this->hasMany("App\BillDetail","id_product","id");//id de products
   	}
}
