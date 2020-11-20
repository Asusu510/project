<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orders_details';
    protected $guarded =['']; // khong bao ve truong nao

    public function product()
    {
    	return $this->belongsTo(Product::class,'od_product_id');
    }
}
