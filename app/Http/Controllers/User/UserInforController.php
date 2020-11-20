<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequestUpdateInfo;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserInforController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('client');
    }
    
    public function updateInfo()
    {
    	$title_page = 'Cập nhật tài khoản';
    	return view('frontend.pages.user.update_info',compact('title_page'));
    }

    public function saveInfo(UserRequestUpdateInfo $request)
    {
    	$data = $request->except('_token');
    	$user = Client::find(\Auth::guard('client')->user()->id);

    	
		if($request->avatar){
			$image_name = $request->avatar->getClientOriginalName(); 
			$request->avatar->move(public_path('uploads'), $image_name);
            $data['avatar'] = $image_name;
		}

		
		// dd($data);
    	$user->update($data);
    	\Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Cập nhật tài khoản thành công'
        ]);

    	return redirect()->back();
    }

    public function updatePassword()
    {
        $title_page = 'Đổi mật khẩu';
        return view('frontend.pages.user.changePassword',compact('title_page'));
    }

    public function savePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'r_new_password' => 'required|same:new_password'
        ],[
            'old_password.required' => 'Không được để trống',
            'new_password.required' => 'Không được để trống',
            'new_password.min' =>'Mật khẩu tối thiểu 6 ký tự',
            'r_new_password.required' =>'Không được để trống',
            'r_new_password.same' =>'Mật khẩu không khớp'
        ]);

    

        if(\Auth::guard('client')->attempt(["email" => $request->email,'password' => $request->old_password])){

            $client = Client::find(\Auth::guard('client')->user()->id);

            $data =$request->except('_token','old_password','r_new_password');

            $data['password'] =Hash::make($request->new_password);

            $data['update_at']  = Carbon::now();

            $client->update($data);

                \Session::flash('toastr',[
                    'type' => 'success',
                    'message' => 'Thay đổi mật khẩu thành công'
                ]);

            return redirect()->route('get.home.login');
        }


        \Session::flash('toastr',[
            'type' => 'error',
            'message' => 'Mật khẩu cũ không đúng'
        ]);

       return redirect()->back();

    }
}
