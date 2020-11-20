<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded =['']; // khong bao ve truong nao

    public function product(){
		return $this->hasMany(Product::class,'pro_category_id','id');
	}
}
