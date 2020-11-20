<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestSlide;
use App\Models\Slide;
use Carbon\Carbon;

class AdminSlideController extends Controller
{
    public function index()
    {
    	$slides = Slide::paginate(10);

    	return view('admin.slide.index',compact('slides'));
    }

    public function create()
    {
    	return view('admin.slide.create');
    }

    public function store(AdminRequestSlide $request)
    {
    	$data = $request->except('_token');

    	$data['created_at']   = Carbon::now();

        $img = str_replace(url('uploads').'/','',$request->sd_image);

        $data['sd_image'] = $img;   


        // dd($data);
        $id = slide::insertGetId($data);

        return redirect()->route('admin.slide.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {   
        $slide = Slide::find($id);

        return view('admin.slide.update', compact('slide'));
    }

    public function update(AdminRequestSlide $request, $id)
    {
        $slide = Slide::find($id);
        $data = $request->except('_token');

        $data['updated_at'] = Carbon::now();
    
        $img = str_replace(url('uploads').'/','',$request->sd_image);

     	 $data['sd_image'] = $img;   
                
        $update = $slide->update($data);
       
        return redirect()->route('admin.slide.index')->with('success','Sửa thành công');
    }

    public function active($id)
    {
        $slide = Slide::find($id);
        $slide->sd_status = ! $slide->sd_status;
        $slide->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $slide = Slide::find($id);

        if ($slide){    

            $slide->delete();
        }


        return redirect()->route('admin.slide.index')->with('success','Xóa thành công');
    }
}
