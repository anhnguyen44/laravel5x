<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
   	public $timestamps = false;

   	public function product(){
   		return $this->belongsTo("App\Product","id_product","id");//id de bill_detail
   	}

   	public function bill(){
   		return $this->belongsTo("App\Bill","id_bill","id");//id de bill_detail
   	}
}

