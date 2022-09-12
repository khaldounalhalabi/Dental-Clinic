<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class GetPatientVisitsController extends Controller
{
    public function get($id)
    {
        try{

            $data['visits'] = Visit::where('patient_id' , $id)->paginate(10) ;
            return view('visits.visits')->with($data) ;
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
