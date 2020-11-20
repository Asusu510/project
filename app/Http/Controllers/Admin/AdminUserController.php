<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestUser;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
   public function index()
   {

   		$users = User::with('role')->orderBy('name','asc')->paginate(10);
     
   		$viewData = [
   			'users' => $users
   		];

   		return view('admin.user.index',$viewData);
   }

   public function create()
   {  
      $roles = Role::all();
      
    	return view('admin.user.create',compact('roles'));
   }

   public function store(AdminRequestUser $request)
   {
   		$data               = $request->except('_token','confirm_password','permissions');
    	$data['created_at']  = Carbon::now();
    	$data['password'] = Hash::make($data['password']);

    	$id                 = User::insertGetId($data);

      if($id){
         $this->syncRole($request->permissions, $id);
      }


    	return redirect()->route('admin.user.index')->with('success','Thêm mới thành công');
   }

   public function edit($id)
    {
    	
      $user = User::find($id);

      $roles = Role::all();

      $user_roles = UserRole::where('user_id', $id)
            ->pluck('role_id')
            ->toArray();

      if(!$user_roles)  $user_roles = [];

    	return view('admin.user.update',compact('user','roles','user_roles'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
            'permissions' => 'required',
        ],[

            'permissions.required' =>"Cần phải cấp quyền cho tài khoản"
        ]);
      
      $user = User::find($id);
      $data       = $request->except('_token','permissions');
      $data['created_at']  = Carbon::now();

   
      $update = $user->update($data);

      if($update){
         $this->syncRole($request->permissions, $id);
      }

    	return redirect()->route('admin.user.index')->with('success','Cập nhật thành công');

    }


    public function status($id)
    {
        $user = User::find($id);
        $user->status = ! $user->status;
        $user->save();

        return redirect()->back();
    }

   

   public function delete($id)
   {
     	$user = User::find($id);

     	if($user){

        UserRole::where('user_id',$id)->delete();  

        $user->delete();;
      } 

     	return redirect()->back();
   }

   private function syncRole($roles, $idUser)
    {
        if(!empty($roles)) {
            $data = [];
            foreach ($roles as $key => $role){
                $data[] =[
                    'user_id' => $idUser,
                    'role_id' => $role
                ];
            }

            \DB::table('user_roles')->where('user_id', $idUser)->delete();
            \DB::table('user_roles')->insert($data);
        }
    }
}
