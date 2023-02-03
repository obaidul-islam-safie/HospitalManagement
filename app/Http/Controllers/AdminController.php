<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){

        $doctor=new doctor;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->specialty=$request->speciality;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }


    public function show_appointment(){

        $data=appointment::all();

        return view('admin.show_appointment',compact('data'));
    }


    public function approved($id){

        $data=appointment::find($id);
        $data->status='Approved';

        $data->save();

        return redirect()->back();
    }


    public function canceled($id){

        $data=appointment::find($id);
        $data->status='Canceled';

        $data->save();

        return redirect()->back();
    }


}
