<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
        public function AdminDashboard(){
            $adminData = User::find(Auth::user()->id);

            return view('admin.dashboard',compact('adminData'));
        }
        //End Method

        public function AdminLoginPage(){
            return view('admin.login');
        }
        //End Method

        public function AdminLogin(Request $request)
        {

        }//End Method


        public function AdminLogout(Request $request)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('admin/login');

        }//end method

        public function Profile()
        {
            $adminData = User::find(Auth::user()->id);
            return view('admin.profile',compact('adminData'));
        }
        //End Method

        public function UpdateProfile(UpdateProfileRequest $request)
        {
            $id = Auth::user()->id;
            $data = User::query()->find($id);
            $data->name =$request->name;
            $data->username =$request->username;
            $data->phone =$request->phone;
            $data->email =$request->email;
            $data->updated_at = Carbon::now();
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                @unlink(public_path('upload/adminImages/' . $data->avatar));
    
                $filename ='upload/adminImages/'. $id . "." . $file->getClientOriginalExtension();
                $file->move(public_path('upload/adminImages'), $filename);
                $data['avatar'] = $filename;
            }
            $data->save();
            return redirect()->route('admin.profile')->with('Profileupdated','Admin Profile Updated');
        }
        //End Method

            public function UpdatePassword(UpdatePasswordRequest $request)
            {
                $user = Auth::user();
                $user->password = Hash::make($request->password);
                /** @var \App\Models\User $user **/
                $user->save();
                Auth::guard('web')->logout();
        
                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
        
                return redirect('admin/login')->with('password-changed','Update Password Successfully');
            }
            //End Method
        
        
    
    
    
    





    
    






}
