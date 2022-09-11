<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class GetPatientReservationsController extends Controller
{
    public function get($id)
    {
        try{

            $data['reservations'] = Reservation::where('patient_id' , $id)->get() ;
            return view('reservations.reservations')->with($data) ;
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
