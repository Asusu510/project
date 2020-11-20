<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection , WithHeadings
{
   	private $product;

   	public function __construct($product)
   	{
   		$this->product = $product;
   	}

    public function collection()
    {
    	$product = $this->product;

    	$arrproduct = [];

    	foreach ($product as $key => $item) {

    		$color = \DB::table('products_details')->where('prod_product_id',$item->id)->value('prod_color_id');

	        $productColor = Color::where('id',$color)->value('cl_name');

	        $size = \DB::table('products_details')->where('prod_product_id',$item->id)->value('prod_size_id');

	        $productSize = Size::where('id',$size)->value('sz_name');

    		$arrproduct[] = [
    			'id'          => $item->id,
    			'Name'        => $item->pro_name,
    			'Image'       => $item->pro_avatar,
    			'Price_entry' => $item->pro_price_entry,
    			'Price'       => $item->pro_price,
    			'Sales'       => $item->pro_sale,
    			'Category'    => $item->category->c_name,
    			'Number'      => $item->pro_number,
    			'Color'       => $productColor,
    			'Size'        => $productSize,
    			'Brand'      =>  $item->brand->br_name			
    		];
    	}
        return collect($arrproduct);
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Image',
            'Price_entry',
            'Price',
            'Sales',
            'Category',
            'Number',
            'Color',
            'Size',
            'Brand',
        ];
    }
}
