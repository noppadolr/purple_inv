<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('backend.customer.index', compact('customers'));
    }
    //End Method

    public function create()
    {
        return view('backend.customer.create');
    }

    public function store(Request $request)
    {

        $id = Auth::user()->id;
        if ($request->file('customer_image')) {

            $name_gen = hexdec(uniqid()) . '.' . $request->file('customer_image')->getClientOriginalExtension();
            $file = $request->file('customer_image');
            $filename = '/upload/customerImages/' . $name_gen;
            $file->move(public_path('/upload/customerImages'), $filename);


            $save_url = '/upload/customerImages/' . $name_gen;
            Customer::insert([
                'name' => $request->name,
                'phone' => $request->phone,
                'customer_image' => $save_url,
                'email' => $request->email,
                'address' => $request->address,
                'created_by' => $id,
                'created_at' => Carbon::now(),
            ]);
            return redirect(route('customer.all'))->with('createSuccess','Crete new customer successfully');
        } else {
            Customer::insert([
                'name' => $request->name,
                'customer_image' => '/upload/no_image.jpg',
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'created_by' => $id,
                'created_at' => Carbon::now(),
            ]);

            return redirect(route('customer.all'))->with('createSuccess','Crete new customer successfully');
        }
        // endif

    }
    //End method

    public function destroy($id)
    {

        Customer::find($id)->delete($id);
        $items= Customer::latest()->get();
        return redirect(route('customer.all'))->with('delete_success','Delete Customer Successfully!');

        // return response()->json([
        //     'success' => 'Record deleted successfully!',
           

        // ]);
    }
    //End Method


    public function edit($id)
    {
        $customers = Customer::query()->findOrFail($id);
        return view('backend.customer.edit', compact('customers'));
    }
    //End Method


    public function update(Request $request)
    {
        $id = $request->id;
        if ($request->file('customer_image')) {
            @unlink(public_path($request->customer_image));
            $name_gen = $id . '.' . $request->file('customer_image')->getClientOriginalExtension();
            $file = $request->file('customer_image');
            $filename = '/upload/customerImages/' . $name_gen;
            $file->move(public_path('/upload/customerImages'), $filename);
            $save_url = '/upload/customerImages/' . $name_gen;

            Customer::query()->findOrFail($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'customer_image' => $save_url,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            return redirect(route('customer.all'))->with('customer_updated', 'Update Customer Successfully');



        } elseif (!$request->file('customer_image')) {
            Customer::query()->findOrFail($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);
            return redirect()->route('customer.all')->with('customer_updated', 'Update Customer Successfully');
        }
    } //End Method




}
