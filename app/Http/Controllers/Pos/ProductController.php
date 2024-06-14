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
}
