<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetPatientByIdController extends Controller
{
    public function get_patient_by_id($id)
    {
       try{
            $patient['patient'] = Patient::findOrFail($id);
            $patient['age'] = Carbon::parse($patient['patient']->birth_date)->diff(Carbon::now())->y;
            return view('patients.PatientProfile')->with($patient);
       }
       catch(\Exception $e){
        $errors['server_error'] = $e->getMessage() ;
        return view('patients.PatientProfile')->with($errors);
       }
    }
}
