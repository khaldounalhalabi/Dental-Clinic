<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexReservationController extends Controller
{
    public function index()
    {
        try {

            $data['reservations'] = DB::table('reservations')
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->orderBy('first_name', 'ASC')
                ->orderBy('last_name', 'ASC')
                ->paginate(20);
            return view('reservations.reservations')->with($data);
        } catch (\Exception $e) {
            $data['server_error'] = $e->getMessage();
            return view('reservations.reservations')->with($data);
        }
    }
}
