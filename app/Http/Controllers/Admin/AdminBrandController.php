<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestBrand;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminBrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::paginate(6);
        if(  request()->searchName ) {
            $name = request()->searchName;
            $brands = Brand::orderByDesc('id')->where('br_name','LIKE','%'.$name.'%')->paginate(6);
        }
    	return view('admin.brand.index',compact('brands'));
    }

    public function create(){
    	return view('admin.brand.create');
    }

    public function store(AdminRequestBrand $request)
    {
    	$data = $request->except('_token');
    	$data['br_slug']     = Str::slug($request->br_name);
    	$data['created_at'] = Carbon::now();
    	$id = Brand::InsertGetId($data);

    	return redirect()->route('admin.brand.index')->with('success','Thêm mới thành công');
    	
    }

    public function edit($id){
    	$brand = Brand::find($id);
    	return view('admin.brand.update', compact('brand'));
    }

    public function update(AdminRequestbrand $request, $id)
    {
    	$brand = Brand::find($id);
    	$data = $request->except('_token');
    	$data['br_slug'] = Str::slug($request->br_name);
    	$data['updated_at'] = Carbon::now();

    	$brand->update($data);
    	return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thành công');
     }

    public function delete($id)
    {
        $brand = Brand::find($id);
        
        if($brand->product->count() > 0){
            
            return redirect()->route('admin.brand.index')->with('error','Thương hiệu có sẩn phẩm không thể xóa');
        }
        $delete = $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'xóa thành công');
    }

     public function hot($id)
     {
    	$brand = Brand::find($id);
    	$brand->br_hot = ! $brand->br_hot;
    	$brand->save();

    	return redirect()->back();
    }
}
