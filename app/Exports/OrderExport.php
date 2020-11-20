<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection , WithHeadings
{
   	private $orders;

   	public function __construct($orders)
   	{
   		$this->orders = $orders;
   	}

    public function collection()
    {
    	$orders = $this->orders;

    	$arrOrders = [];

    	foreach ($orders as $key => $item) {

    		$arrOrders[] = [
    			'id'          => $item->id,
    			'name'        => $item->order_name,
    			'email'       => $item->order_email,
    			'phone'       => $item->order_phone,
    			'address'     => $item->order_address,
    			'total money' => number_format($item->order_total_money),
    			'shipping'    => number_format(Shipping::where('id',$item->order_shipping_fee)->value('shipping_fee')),
    			'note'        => $item->order_note,
    			'payment'     =>Payment::where('id',$item->order_payment)->value('payment_type'),
    			'status'      =>  $item->getStatus($item->order_status)['name'],
    			'create'      => $item->created_at,
    			
    		];
    	}
        return collect($arrOrders);
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Total money',
            'Shipping',
            'Note',
            'Payment',
            'Status',
            'Created ',
            

        ];
    }
}
