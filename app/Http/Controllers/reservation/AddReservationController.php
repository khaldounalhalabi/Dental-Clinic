<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddReservationController extends Controller
{
    public function add(Request $request , $id = null)
    {
        try{


            $rules = [
                'first_name' => 'string|required',
                'last_name' => 'string|required',
                'date' => 'required',
                'time' => 'required',
                'phone_number' => 'string|digits|nullable',
                'home_number' => 'string|digits|nullable',
                'reason' => 'string|nullable',
                'notes' => 'text|min:3' ,
            ];


            $validator = Validator::make($request->all(), $rules);

            if($validator->failed()){
                $data['errors'] = json_encode($validator->errors()) ;
                return back()->with($data) ;
            }

            $data['reservation'] = new Reservation;

            if($id){
                $data['reservation']->patient_id = $id ;
            }

            $data['reservation']->first_name = $request->first_name ;
            $data['reservation']->last_name = $request->last_name;
            $data['reservation']->date = $request->date;
            $data['reservation']->time = $request->time;
            $data['reservation']->phone_number = $request->phone_number;
            $data['reservation']->home_number = $request->home_number;
            $data['reservation']->reason = $request->reason;
            $data['reservation']->notes = $request->notes;
            $data['reservation']->save() ;


            return view('reservations.SingleReservation')->with($data) ;


        }
        catch(\Exception $e){
            $data['server_error'] = $e->getMessage() ;
            return back()->with($data) ;
        }
    }

}
