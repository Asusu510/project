<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Color;
use App\Models\Size;
use App\Services\ProcessViewService; // tinh view

class ProductDetailController extends Controller
{
    public function getProductDetail($slug)
    {
    	
  
    	$arraySlug = explode('-',$slug);
    	$id = array_pop($arraySlug);

    	if($id){
    		$productsSale = Product::where('pro_sale','<>','0')->orderByDesc('id')->limit(5)->get();
   
    		$product = Product::with('category:id,c_name,c_slug','keyword','brand','size','color')->findOrFail($id);
            // tinh view
            ProcessViewService::view('products','pro_view','product',$id);

            // lay danh gia
            $ratings = Rating::with('client:id,name,avatar')->where('r_product_id', $id)->orderByDesc('id')->limit(10)->get();

            // thong ke
            $ratingDefault = $this->mapRatingDefault();

            $ratingsDashboard = Rating::groupBy('r_number')
                                      ->where('r_product_id', $id)
                                      ->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total '))
                                      ->addSelect('r_number')
                                      ->get()->toarray();

            foreach ($ratingsDashboard as $key => $item) {
                $ratingDefault[$item['r_number']] = $item;
            }
  
            //  lấy màu của sản phẩm

            $productColor = Product::find($id)->Color;
            $productSize  = Product::find($id)->Size;
            
    		$view = [
				'product' => $product,
                'ratings' => $ratings,
				'productsSale' => $productsSale,
                'title_page' => $product->pro_name,
                'productColor' =>$productColor,
                'productSize' => $productSize,
                'ratingDefault' =>$ratingDefault
			];

			return view('frontend.pages.product_detail.index', $view);
    	}
        
    	return redirect()->to('/');
    }



    public function mapRatingDefault()
    {
        $ratingDefault = [];
        for($i =1 ; $i <= 5 ; $i++){
            $ratingDefault[$i] = [
                'count_number' =>0,
                'total' => 0,
                'r_number' =>0
            ];
        }

        return $ratingDefault;
    }
}
