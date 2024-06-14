<?php

namespace App\Http\Controllers\Pos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryAll(){

        $categoris = Category::latest()->get();
        return view('backend.category.category_all',compact('categoris'));

    } // End Mehtod 


    public function Store(Request $request)
    {
        $id = Auth::user()->id;
        // $request->validate(
        //     [
        //         'name' => 'required|string',
        //     ]
        // );
        Category::insert([
            'name' => $request->name,
            'created_by' => $id,
            'created_at' => Carbon::now(),
        ]);

        return redirect(route('category.all'))->with('add_success','Create New category successfully');

    }//End Method

    public function edit($id)
    {

        $categoris = Category::query()->findOrFail($id);
        return view('backend.category.edit',compact('categoris'));
    }
    //End Method

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required|string',]

        );
        $category = Category::find($request->find_id);
        $category->name = $request->name;
        $category->update();
        return redirect(route('category.all'))->with('category_updated', 'Category Updated Successfully');

    }//End method

    public function delete($id)
    {
        Category::find($id)->delete($id);

        return redirect(route('category.all'))->with('delete_success', 'Delete Category Successfully');
    }
    //end method
}
