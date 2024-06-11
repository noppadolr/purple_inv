<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Status;
class UnitController extends Controller
{
    public function UnitAll(){

        $units = Unit::latest()->get();
        $status= Status::latest()->get();
        return view('backend.unit.unit_all',compact('units','status'));
    } // End Method 

        public function Create()
        {
            return view('backend.unit.create');
        }
        //End Method

    public function Store(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate(
            [
                'name' => 'required|string',
            ]
        );
        Unit::insert([
            'name' => $request->name,
            'created_by' => $id,
            'created_at' => Carbon::now(),
        ]);

        return redirect(route('unit.all'))->with('add-unit-success','Create New Unit successfully');
    }
    //End Method

    public function edit($id)
    {
        $statuses = Status::latest()->get();
        $units = Unit::query()->findOrFail($id);
        return view('backend.unit.edit', compact('units','statuses'));
    }
    //End Method

    public function update(Request $request)
    {
        // dd($request->status);
        $id = Auth::user()->id;
        $request->validate(
            [
                'name' => 'required|string',
                'status'=>'required'
            ]
        );

        $unit = Unit::find($request->input('id'));
        $unit->name = $request->name;
        $unit->status = $request->status;
        $unit->updated_at = Carbon::now();
        $unit->updated_by = Auth::user()->id;
        $unit->update();
        return redirect(route('unit.all'))->with('unit_updated', 'Unit Updated Successfully');

    }
    //end method

    public function destroy($id)
    {
        Unit::find($id)->delete($id);

        return redirect(route('unit.all'))->with('delete_success', 'Delete Unit successfully');
    } //End Method





    
    
}
