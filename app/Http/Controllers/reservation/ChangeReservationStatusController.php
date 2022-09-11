<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ChangeReservationStatusController extends Controller
{
    public function change_status(Request $request)
    {
        try{
            $reservation = Reservation::findOrFail($request->id);
            $reservation->status = $request->status;
            $reservation->save();
            if(isset($reservation->patient_id)&&$request->status = 'done'){
                return redirect()->route('visit.page' , ['id' => $reservation->patient_id] , ) ;
            }
            if(!isset($reservation->patient_id) && $request->status = 'done'){
                return redirect()->route('add.patient.page') ;
            }
            return back();
        }
        catch(\Exception $e){
            $data['server_error'] = $e->getMessage() ;
            return back()->with($data) ;
        }
    }
}
