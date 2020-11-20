<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $guarded =[''];
     

     public function menu(){
		return $this->hasOne(Menu::class,'id','a_menu_id');
	}
}
