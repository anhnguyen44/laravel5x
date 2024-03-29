<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
   	public $timestamps = false;

   	public function bill_detail(){
   		return $this->hasMany("App\BillDetail","id_bill","id");//id de Bill
   	}

   	public function customer(){
   		return $this->belongsTo("App\Customer","id_customer","id"); //id de Bill
   	}
}
