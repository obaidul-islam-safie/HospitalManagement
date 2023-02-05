<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){

        if(Auth::id()){
            if(Auth::user()->usertype==1){

                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
       
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

        if(Auth::id()){
            if(Auth::user()->usertype==1){

                $data=appointment::all();

                return view('admin.show_appointment',compact('data'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
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


    public function show_doctor(){

        $data=doctor::all();

        return view('admin.show_doctor',compact('data'));
    }


    public function delete_delete($id){

        $doctor=doctor::find($id);

        $doctor->delete();
        return redirect()->back();
    }


    public function update_doctor($id){

        $data=doctor::find($id);

        return view('admin.update_doctor',compact('data'));
    }



    public function edit_doctor(Request $request , $id){

        $doctor=doctor::find($id);


        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->specialty=$request->speciality;


        $image=$request->file;

        if($image){

        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Added Successfully');

    }


    public function send_mail($id){

        $data=appointment::find($id);

        return view('admin.send_mail',compact('data'));
    }


    public function sendmail(Request $request , $id){

        $data=appointment::find($id);

        $details=[

            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'url' => $request->url,
            'endpart' => $request->endpart

        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }



}
