<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     protected $guarded =[''];

     public function article(){
		return $this->hasMany(Article::class,'a_menu_id','id');
	}
}
