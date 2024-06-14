<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->get();
            return view('backend.product.all',compact('product'));
    }//End Method

    public function add()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.product.add',compact('supplier', 'unit', 'category'));
    }//end method

    public function store(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'created_by' => $id,
            'created_at' => Carbon::now(),
        ]);
        return redirect(route('product.all'))->with('added','Create new Product successfully');

    }//end method
}
