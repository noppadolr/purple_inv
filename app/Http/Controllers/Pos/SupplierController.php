<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierAddRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }
    //End Method

    public function SupplierStore(SupplierAddRequest $request)
    {  
        $id = Auth::user()->id;
        Supplier::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => $id,
            'created_at' => Carbon::now(),
        ]);
        return redirect(route('supplier.all'))->with('add_success','Create new Supplier successfully');
    }
    //End Method

    public function SupplierEdit($id)
    {
        $suppliers = Supplier::query()->findOrFail($id);
        return view('backend.supplier.supplier_edit', compact('suppliers'));
    }
    //End Method
    public function SupplierUpdate(Request $request) 
    {
        $request->validate(
            [
                'name' => 'required|string',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required|string',
            ]
        );
        $supplier = Supplier::find($request->input('find_id'));
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_at = Carbon::now();
        $supplier->updated_by = Auth::user()->id;
        $supplier->update();
        return redirect(route('supplier.all'))->with('supplier_updated', 'Supplier Updated Successfully');
    }
    //End Method

    public function destroy($id)
    {
        Supplier::find($id)->delete($id);

        return redirect(route('supplier.all'))->with('delete_success', 'Delete Supplier successfully');
    } //End Method

    public function view($id)
    {
        // dd($id);
        $suppliers = Supplier::query()->findOrFail($id);
        return view('backend.supplier.view',compact('suppliers'));
    } //End Method








}
