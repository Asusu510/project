<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model
{
    protected $table = 'favourites';
    protected $guarded =['']; // khong bao ve truong nao
}
