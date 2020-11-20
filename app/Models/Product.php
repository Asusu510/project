<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Product extends Model
{
	protected $table = 'products';
    protected $guarded =['']; // khong bao ve truong nao

    public function category(){
		return $this->hasOne(Category::class,'id','pro_category_id');
	}

	public function keyword()
    {
    	return $this->belongsToMany(Keyword::class,'products_keywords','pk_product_id','pk_keyword_id');
    }

    public function size()
    {
    	return $this->belongsToMany(Size::class,'products_details','prod_product_id','prod_size_id');
    }

    public function color()
    {
    	return $this->belongsToMany(Color::class,'products_details','prod_product_id','prod_color_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','pro_brand_id');
    }

    public function favourite()
    {
        return $this->belongsToMany(Client::class,'favourites','fa_product_id','fa_user_id');
    }
    
}
