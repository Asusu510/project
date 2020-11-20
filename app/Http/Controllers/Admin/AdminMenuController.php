<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestMenu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminMenuController extends Controller
{
    public function index()
    {
    	$menus = Menu::paginate(10);
    	return view('admin.menu.index',compact('menus'));
    }

    public function create()
    {
    	return view('admin.menu.create');
    }

    public function store(AdminRequestMenu $request)
    {
    	$data               = $request->except('_token');
    	$data['mn_slug']     = Str::slug($request->mn_name);
    	$data['created_at']  = Carbon::now();
    	$id                 = Menu::insertGetId($data);

    	return redirect()->route('admin.menu.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$menu = Menu::find($id);

    	$view = [

    		'menu' => $menu
    	];
    	return view('admin.menu.update',$view);
    }

    public function update(AdminRequestMenu $request, $id)
    {
    	$menu           = Menu::find($id);
    	$data               = $request->except('_token');
    	$data['mn_slug']     = Str::slug($request->mn_name);
    	$data['updated_at'] = Carbon::now();

    	$update = $menu->update($data);

    	return redirect()->route('admin.menu.index')->with('success','Cập nhật thành công');

    }

    public function delete($id)
    {
        $menu = Menu::find($id);

        if($menu->article->count() > 0){
            
            return redirect()->route('admin.menu.index')->with('error','Menu có bài viết không thể xóa');
        }

        $delete = $menu->delete();
      
        return redirect()->route('admin.menu.index')->with('success', 'xóa thành công');
    }

    public function active($id)
    {
        $menu = Menu::find($id);
        $menu->mn_status = ! $menu->mn_status;
        $menu->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $menu = Menu::find($id);
        $menu->mn_hot = ! $menu->mn_hot;
        $menu->save();

        return redirect()->back();
    }
}
