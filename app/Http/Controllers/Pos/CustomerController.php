<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class CustomerController extends Controller
{
    public function index()
    {
        $customers= Customer::latest()->get();
        return view('backend.customer.index',compact('customers'));
    }
    //End Method


}
