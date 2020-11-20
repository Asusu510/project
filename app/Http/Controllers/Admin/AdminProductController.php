<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Size;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;
use App\Exports\ProductExport;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category:id,c_name');

        if($id = request()->searchID) $products->where('id',$id);
        if( $name = request()->searchName) $products->where('pro_name','LIKE','%'.$name.'%'); 
        if( $category = request()->searchCategory) $products->where('pro_category_id', $category);

        if(request()->sort){
            $sort = request()->sort;

            switch($sort){
                case 'Az' :
                    $products = $products->orderBy('pro_name','asc');
                    break;
                case 'Za' :
                    $products = $products->orderBy('pro_name','desc');
                    break;
            }
        }

        if(request()->show){
            $show =request()->show;
            $products = $products->orderByDesc('id')->paginate($show);
        }
        else{
            $show = 5;
            $products = $products->orderByDesc('id')->paginate(5);
        }

        
        if(request()->export){

            return \Excel::download(new ProductExport($products), 'san-pham.xlsx');

        }
        
        $categories = Category::all();
        $view =[
            'products' => $products,
            'categories' => $categories,
            'show' => $show,
            'query' => request()->query() // giữ lại phân trang
        ];
    	return view('admin.product.index',$view);
    }

    public function view($id){

        $product = Product::with('category:id,c_name')->find($id);
        // dd($product);
 
        return view('admin.product.show_product',compact('product'));
    }

    public function create()
    {
        $keywords = Keyword::all();
    	$categories = Category::all();
        $brands = Brand::all();
        $view = [
            'keywords' => $keywords,
            'categories' => $categories,
            'brands' => $brands
        ];
    	return view('admin.product.create', $view);
    }

    public function store(AdminRequestProduct $request)
    {
    	$data = $request->except('_token','keywords','size','color');
    	$data['pro_slug']     = Str::slug($request->pro_name);
    	$data['created_at']   = Carbon::now();

        $img = str_replace(url('uploads').'/','',$request->pro_avatar);

        $data['pro_avatar'] = $img;

        $img_list = json_decode($request->pro_avatar_list);
        $imgs ='';
        if(!empty($img_list)){
            foreach ($img_list as $key => $item){
                $imgs .= str_replace(url('uploads').'/','',$item).","; 
            }
        }

        $imgs = trim($imgs,',');
         
        $data['pro_avatar_list'] = $imgs;

        // dd($data);
        $id = Product::insertGetId($data);

        if($id){
            $this->syncKeyword($request->keywords, $id);
            
            $prod_color_id ='';
            $prod_size_id ='';
            $prod_color_id = $this->syncColor($request->color);
            $prod_size_id = $this->syncSize($request->size);

            $this->syncProductdetail($prod_size_id,$prod_color_id, $id);

        }

        return redirect()->route('admin.product.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {   
        
        $categories = Category::all();
        $product = Product::with('category:id,c_name')->find($id);

        $brands = Brand::all();

        $keywords = Keyword::all();
        $keywordOld = \DB::table('products_keywords')
            ->where('pk_product_id', $id)
            ->pluck('pk_keyword_id')
            ->toArray();

        $sizeID = \DB::table('products_details')->where('prod_product_id', $id)->value('prod_size_id');
        if($sizeID != null){
            $sizeName = \DB::table('sizes')->find($sizeID);
        }

        $colorID = \DB::table('products_details')->where('prod_product_id', $id)->value('prod_color_id');
        if($colorID != null){
            $colorName = \DB::table('colors')->find($colorID);
        }


        if(!$keywordOld)  $keywordOld = [];
        if(!isset($sizeName))  $sizeName = '';
        if(!isset($colorName))  $colorName = '';

        $view = [
            'categories' => $categories,
            'product' => $product,
            'keywords' => $keywords,
            'keywordOld' => $keywordOld,
            'sizeName' => $sizeName,
            'colorName' => $colorName,
            'brands' => $brands
        ];

        return view('admin.product.update', $view);
    }

    public function update(AdminRequestProduct $request, $id)
    {
        $product = Product::find($id);
        $data = $request->except('_token','keywords');
        $data['pro_slug'] = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        $img = str_replace(url('uploads').'/','',$request->pro_avatar);

        $data['pro_avatar'] = $img;

        $img_list = json_decode($request->pro_avatar_list);

        
        if(!empty($img_list)){
            $imgs ='';
            foreach ($img_list as $key => $item){
                $imgs .= str_replace(url('uploads').'/','',$item).","; 
            }
            $imgs = trim($imgs,',');

            $data['pro_avatar_list'] = $imgs;
        }else{
             $data['pro_avatar_list'] = $request->pro_avatar_list;
        }
        
       
         
        $update = $product->update($data);
        if($update){

            $this->syncKeyword($request->keywords, $id);

            $prod_color_id ='';
            $prod_size_id ='';
            $prod_color_id = $this->syncColor($request->color);
            $prod_size_id = $this->syncSize($request->size);
            $this->syncProductdetail($prod_size_id,$prod_color_id, $id);

        }

        
        return redirect()->route('admin.product.index')->with('success','Sửa thành công');
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->pro_active = ! $product->pro_active;
        $product->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->pro_hot = ! $product->pro_hot;
        $product->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product){
            \DB::table('products_details')->where('prod_product_id',$id)->delete();

            \DB::table('products_keywords')->where('pk_product_id',$id)->delete();       

            $product->delete();
        }


        return redirect()->route('admin.product.index')->with('success','Xóa thành công');
    }

   // up keywords
    private function syncKeyword($keywords, $idProduct)
    {
        if(!empty($keywords)) {
            $data = [];
            foreach ($keywords as $key => $keyword){
                $data[] =[
                    'pk_product_id' => $idProduct,
                    'pk_keyword_id' => $keyword
                ];
            }

            \DB::table('products_keywords')->where('pk_product_id', $idProduct)->delete();
            \DB::table('products_keywords')->insert($data);
        }
    }

    private function syncColor($color)
    {
        if(!empty($color)) {

            $check = Color::where('cl_name',$color)->first();
           
            if(empty($check)) {
                $data['cl_name'] = $color;
                $data['created_at'] = Carbon::now();
                $id = \DB::table('colors')->insertGetId($data);
   
            }else{
                $id = $check->id;
            }

            return $id;

        }
        
    }

    private function syncSize($size)
    {
        if(!empty($size)) {
            
            $check = Size::where('sz_name',$size)->first();
           
            if(empty($check)) {
                $data['sz_name'] = $size;
                $data['created_at'] = Carbon::now();
                $id = \DB::table('sizes')->insertGetId($data);
   
            }else{
                $id = $check->id;
            }

            return $id;
        }
       
    }

    private function syncProductdetail($prod_size_id, $prod_color_id, $idProduct)
    {
        
            $data['prod_size_id'] = $prod_size_id;
            $data['prod_color_id'] = $prod_color_id;
            $data['prod_product_id'] = $idProduct;
            
            \DB::table('products_details')->where('prod_product_id', $idProduct)->delete();            
            \DB::table('products_details')->insert($data);
    }


}
