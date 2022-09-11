<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class AddFormerPatientReservationController extends Controller
{
    public function add($id)
    {
        try {
            $data['patient'] = Patient::where('id', $id)->first();
            return view('reservations.AddFormerPatientReservation')->with($data);
        } catch (\Exception $e) {
            $data['server_error'] = $e->getMessage() ;
            return view('reservations.AddFormerPatientReservation')->with($data) ;
        }
    }
}
