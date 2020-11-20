<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';
    protected $guarded =['']; // khong bao ve truong nao

    public function product()
    {
    	return $this->belongsToMany(Product::class,'products_keywords','pk_keyword_id','pk_product_id');
    }
}
