<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminCategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::with('product');

        if($id = request()->searchID) $categories->where('id',$id);
        if( $name = request()->searchName) $categories->where('c_name','LIKE','%'.$name.'%'); 

        if(request()->sort){
            $sort = request()->sort;

            switch($sort){
                case 'Az' :
                    $categories = $categories->orderBy('c_name','asc');
                    break;
                case 'Za' :
                    $categories = $categories->orderBy('c_name','desc');
                    break;
            }
        }

        if(request()->show){
            $show =request()->show;
            $categories = $categories->orderByDesc('id')->paginate($show);
        }
        else{
            $show = 5;
            $categories = $categories->orderByDesc('id')->paginate(5);
        }


        $view = [
            'categories' => $categories,
            'query' => request()->query()
        ];
    	return view('admin.category.index',$view);
    }

    public function view($id){
        $category = Category::find($id);
        $products = Product::where('pro_category_id',$id)->orderByDesc('id')->paginate(10);

        return view('admin.category.show_Category',compact('products','category'));
    }

    public function create()
    {
        $categories = Category::all();
    	return view('admin.category.create',compact('categories'));
    }

    public function store(AdminRequestCategory $request)
    {
    	$data               = $request->except('_token');
    	$data['c_slug']     = Str::slug($request->c_name);
    	$data['created_at']  = Carbon::now();
    	$id                 = Category::insertGetId($data);

    	return redirect()->route('admin.category.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	$categories = Category::all();
    	$view = [
    		'categories' => $categories,
    		'category' => $category
    	];
    	return view('admin.category.update',$view);
    }

    public function update(AdminRequestCategory $request, $id)
    {
    	$category           = Category::find($id);
    	$data               = $request->except('_token');
    	$data['c_slug']     = Str::slug($request->c_name);
    	$data['updated_at'] = Carbon::now();

    	$update = $category->update($data);

    	return redirect()->route('admin.category.index')->with('success','Cập nhật thành công');

    }

    public function delete($id)
    {
        $category = Category::find($id);

        if($category->product->count() > 0){
            
        	return redirect()->route('admin.category.index')->with('error','Danh mục có sẩn phẩm không thể xóa');
        }
        $delete = $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'xóa thành công');
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category->c_status = ! $category->c_status;
        $category->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot = ! $category->c_hot;
        $category->save();

        return redirect()->back();
    }
}
