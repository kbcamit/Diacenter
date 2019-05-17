<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Doctor::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:doctors',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'join_date' => 'required',
            'designation' => 'required',
            'mobile' => 'required',
            'contact_address' => 'required'
        ]);

        return Doctor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'father_name' => $request['father_name'],
            'mother_name' => $request['mother_name'],
            'dob' => date('Y-m-d', strtotime($request['dob'])),
            'join_date' => date('Y-m-d', strtotime($request['join_date'])),
            'designation' => $request['designation'],
            'mobile' => $request['mobile'],
            'contact_address' => $request['contact_address'],
            'image' => '',
            'status' => 1
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return ['message'=> 'Doctor Deleted'];
    }
}
