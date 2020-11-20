<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded =[''];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }

    // demo
    public function hasPermission($route)
    {
        $routes = $this->route();

        return in_array($route,$routes) ? true : false;
    }

    

    public function route()
    {   
        $data = [];

        foreach($this->getRoles as $role){
            $permissions = json_decode($role->permissions);
            foreach($permissions as $permission){
                array_push($data,$permission);
            }
            $data = array_unique($data);
            
        }

        return $data;
    }

    public function getRoles()
    {
       return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }
}
