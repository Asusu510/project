<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; 

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded =['']; // khong bao ve truong nao

    protected $status =[
    	'1' => [
    		'class' => 'warning',
    		'name' => 'Tiếp nhận'
    	],

    	'2' => [
    		'class' => 'info',
    		'name' => 'Đang vận chuyển'
    	],

    	'3' => [
    		'class' => 'success',
    		'name' => 'Đã giao'
    	],

    	'-1' => [
    		'class' => 'danger',
    		'name' => 'Đã hủy'
    	],
    ];

    public function getStatus()
    {
    	return Arr::get($this->status, $this->order_status, "[N\A]");
    }

    public function payment()
    {
        return $this->hasOne(Payment::class,'id','order_payment');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class,'id','order_shipping_fee');
    }
}
