<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestRole;
use App\Models\Role;
use App\Models\UserRole;
use Carbon\Carbon;
use Route;

class AdminRoleController extends Controller
{
    public function index()
    {
    	$roles = Role::paginate(10);

    	return view('admin.role.index',compact('roles'));
    }

    public function create()
    {

    	$routes = [];

    	$all = Route::getRoutes();
    	
    	foreach ($all as $key => $item) {

    		$checkname = strpos($item->getName(), 'admin');

    		if($checkname !== false) {
    			array_push($routes,$item->getName());
    		}
    		
    	}
    	// dd($routes);

    	return view('admin.role.create',compact('routes'));
    }

    public function store(AdminRequestRole $request)
    {
    	
    	$data = $request->except("_token");
        $push = $request->permissions;

        array_push($push, "admin.index","admin.get.logout");

    	$data['permissions'] = json_encode($push);


    	$id = Role::InsertGetId($data);

    	return redirect()->route('admin.role.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
    	$role = Role::find($id);
    	
    	$permission = json_decode($role->permissions);

    	$routes = [];

    	$all = Route::getRoutes();
    	
    	foreach ($all as $key => $item) {

    		$checkname = strpos($item->getName(), 'admin');

    		if($checkname !== false) {
    			array_push($routes,$item->getName());
    		}
    		
    	}

    	$view =[

    		'role' =>$role,
    		'permission' =>$permission,
    		'routes' => $routes
    	];
    	return view('admin.role.update',$view);
    }

    public function update(AdminRequestRole $request, $id)
    {
    	$role = Role::find($id);
    	$data = $request->except("_token");
        
    	$push = $request->permissions;

        $data['permissions'] = json_encode($push);

    	$role->update($data);
    	return redirect()->route('admin.role.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $role = Role::find($id);

        if($role){

          UserRole::where('role_id',$id)->delete();  

          $role->delete();;
        } 

        return redirect()->back();
        }
}
