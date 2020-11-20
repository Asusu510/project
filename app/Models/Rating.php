<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Client;

class Rating extends Model
{
	protected $table = 'ratings';
    protected $guarded =['']; // khong bao ve truong nao

    public function product(){
		return $this->belongsTo(Product::class,'r_product_id');
	}

	public function client(){
		return $this->belongsTo(Client::class,'r_user_id');
	}
}
