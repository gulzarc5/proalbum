<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Image;
use Str;
use File;

class UnitsController extends Controller
{
    public function showUnitsAddForm()
    {
        return view('admin.units.add_units');
    }

    public function addUnits(Request $request)
    {
        $validatedData = $request->validate([
            'units' => 'required'
        ]);

        DB::table('units')
            ->insert([ 
            	'units' => $request->input('units'), 
                'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);

        return redirect()->back()->with('message', 'Units has been added successfully');
    }

    public function showUnitsList(Request $request)
    {
        $units = DB::table('units')->get();

        return view('admin.units.units_list', ['units' => $units]);
    }

    public function showUnitsEditForm($units_id) 
    {
        try {
            $units_id = decrypt($units_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $units_record = DB::table('units')
            ->where('id', $units_id)
            ->first();

        return view('admin.units.edit_units', ['units_record' => $units_record]);
    }

    public function updateUnits(Request $request) 
    {
        try {
            $units_id = decrypt($request->input('units_id'));
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'units' => 'required'
        ]);

        DB::table('units')
            ->where('id', $units_id)
            ->update([ 
                'units' => $request->input('units'), 
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);

        return redirect()->back()->with('message', 'Units has been updated successfully');
    }

    public function deleteUnits($units_id) 
    {
        try {
            $units_id = decrypt($units_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('units')
            ->where('id', $units_id)
            ->delete();

        return redirect()->back();
    }
}
