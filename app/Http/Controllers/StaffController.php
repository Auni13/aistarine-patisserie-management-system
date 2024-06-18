<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use DB;
use Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff :: all();
        return view('staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'staff_ic'=> 'required',
            'staff_name'=> 'required',
            'position'=> 'required'

        ]);
        Staff::create($request->all());
   
        return redirect()->route('staff.index')
                        ->with('success','Staff created successfully.');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('staff.show',compact('staff'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'staff_ic' => 'required',
            'staff_name' => 'required',
            'position' => 'required',
        ]);

        DB::table('staff')->where('id',$request->id)->update([
            'staff_ic' => $request->staff_ic,
            'staff_name' => $request->staff_name,
            'position' => Hash::make($request->position)
        ]);
  
        // $student->update($request->all());
  
        return redirect()->route('staff.index')
                        ->with('success','Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
  
        return redirect()->route('staff.index')
                        ->with('success','Staff deleted successfully');
    }
}
