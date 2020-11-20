<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $guarded =['']; // khong bao ve truong nao

    public function product(){
		return $this->hasMany(Product::class,'pro_brand_id','id');
	}
}
