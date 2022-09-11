<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class SearchReservationController extends Controller
{
    public function search(Request $request)
    {
        try {

            $patientQuery = Reservation::query();
            $first_name = $request->first_name;
            $last_name = $request->last_name;

            if (isset($first_name)) {
                $patientQuery->where('first_name', $first_name);
            }

            if (isset($last_name)) {
                $patientQuery->where('last_name', $last_name);
            }

            $data['patients'] = $patientQuery
                ->orderBy('first_name', 'ASC')
                ->orderBy('last_name', 'ASC')
                ->paginate(20);



            return view('patients.patients')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
