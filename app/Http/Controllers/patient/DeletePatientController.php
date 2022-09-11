<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class DeletePatientController extends Controller
{
    public function delete($id , $page = null)
    {
        $patient = Patient::where('id' , $id)->first() ; 
        $patient->delete() ; 
        if($page = 1){
            return redirect()->route('index.patients') ; 
        }
        return back() ; 
    }
}
