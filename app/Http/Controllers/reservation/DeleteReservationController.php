<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DeleteReservationController extends Controller
{
    public function delete($id , $page = null)
    {
        $reservation = Reservation::where('id' , $id)->first() ; 
        $reservation->delete() ; 
        if($page = 1){
            return redirect()->route('index.reservation') ; 
        }
        return back() ; 
    }
}
