<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class EditReservationController extends Controller
{
    public function edit(Request $request , $id)
    {

        try{

            $rules = [
                'first_name' => 'string|required',
                'last_name' => 'string|required',
                'date' => 'required',
                'time' => 'required',
                'phone_number' => 'string|nullable|max:15|min:10',
                'home_number' => 'string|nullable|max:10|min:7',
                'reason' => 'string|nullable',
                'notes' => 'text|min:3',
            ];

            $d = $request->all() ;

            $validator = Validator::make($d , $rules) ;

            if($validator->failed()){
                $data['errors'] = $validator->errors() ;
                return back()->with($data['errors']) ;
            }

            $data['reservation'] = Reservation::where('id' , $id)->first() ;

            $data['reservation']->first_name = $request->first_name ;
            $data['reservation']->last_name = $request->last_name ;
            $data['reservation']->date = $request->date ;
            $data['reservation']->time = $request->time ;
            $data['reservation']->home_number = $request->home_number ;
            $data['reservation']->phone_number = $request->phone_number ;
            $data['reservation']->reason = $request->reason ;
            $data['reservation']->notes = $request->notes ;
            $data['reservation']->save() ;
            return back()->with($data) ;
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
