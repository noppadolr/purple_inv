<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.dashboard');
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





    
    






}
