<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ShowReservationController extends Controller
{
    public function show($id)
    {
        try {

            $data['reservation'] = Reservation::where('id', $id)->first();
            return view('reservations.SingleReservation')->with($data);
        } catch (\Exception $e) {
            $data['server_error'] = $e->getMessage();
            return view('reservations.SingleReservation')->with($data);
        }
    }
}
