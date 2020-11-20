<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

class ProductController extends FrontendController
{
    public function index()
    {

        $products = Product::where('pro_active', 1);
         
        if($category = Request()->category) $products = $products->where('pro_category_id', $category);
        $products = $this->filter($products);
       
    	$view = [
    		'products' => $products,
            'title_page' =>'Shop Now',
            'query' => request()->query()

    	];
    	   
    	return view('frontend.pages.product.index', $view);
    }

    public function category($slug)
    {   
        $arraySlug = explode('-', $slug); // chuyen thanh mang
        $id = array_pop($arraySlug);      // lay phan tu cuoi la id

        $category = Category::find($id);
        // dd($category);
        $category_name = $category->c_name;
        $products = Product::with('category')->where([
            'pro_category_id' => $id,
            'pro_active' => 1
        ]);
        
        $products = $this->filter($products);
        
        $view = [
            'category' => $category,
            'products' => $products,
            'title_page' =>$category_name,
            'query' => request()->query()
        ];
        return view('frontend.pages.product.index', $view);
    }


    private function filter($products)
    {
        if($searchName = request()->search) $products = $products->where('pro_name','like','%'.$searchName.'%')  ;

        if($searchColor = request()->color) {
             $products->whereHas('color', function($query) use($searchColor) {
                 $query->where('prod_color_id', $searchColor);
             });        
        }

        if($searchSize = request()->size) {
             $products->whereHas('size', function($query) use($searchSize) {
                 $query->where('prod_size_id', $searchSize);
             });        
        }

        if($searchKeyword = request()->keyword) {
             $products->whereHas('keyword', function($query) use($searchKeyword) {
                 $query->where('pk_keyword_id', $searchKeyword);
             });        
        }


        if(request()->priceFrom && request()->priceTo){
            $priceFrom = request()->priceFrom;
            $priceTo = request()->priceTo;

            $products = $products->whereBetween('pro_price',[$priceFrom*1000, $priceTo*1000]);
        }
        
        if(request()->show && request()->filter){
            $show = request()->show;
            $filter = request()->filter;

            switch($filter){
                case 'new' :
                    $products = $products->orderBy('id','desc')->paginate($show);
                    break;
                case 'pro_price' :
                    $products = $products->orderBy('pro_price','desc')->paginate($show);
                    break;
                case 'old' :
                    $products = $products->orderBy('id','asc')->paginate($show);
                    break;
                case 'pro_price1' :
                    $products = $products->orderBy('pro_price','asc')->paginate($show);
                    break;
            }
        }
        else{
            $products = $products->orderBy('id')->paginate(6); 
        }

        return $products;
    }

}


