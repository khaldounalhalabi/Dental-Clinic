<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Visit;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddVisitController extends Controller
{
    public function add(Request $request , $id)
    {
        try{
            $rules = [
                'type' => 'nullable|string',
                'cost' => 'numeric',
                'date' => 'required' ,
                'time' => 'nullable' ,
            ];

            $requestData = $request->all() ;

            $validator = Validator::make($requestData, $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return back()->with($data);
            }

            $data['visit'] = new Visit;
            $data['visit']->patient_id = $id;
            $data['visit']->type = $request->type;
            $data['visit']->description = $request->description;
            $data['visit']->prescription = $request->prescription;
            $data['visit']->procedure = $request->procedure;
            $data['visit']->cost = $request->cost;
            $data['visit']->date = $request->date;
            $data['visit']->time = $request->time;
            $data['visit']->save();

            $newIncome = new Income ;
            $newIncome->visit_id = $data['visit']->id ;
            $newIncome->description = " زيارة من قبل المريض"." ".$data['visit']->patient->first_name.' '.$data['visit']->patient->last_name ;
            $newIncome->value = $data['visit']->cost ;
            $newIncome->date = $data['visit']->date ;
            $newIncome->time = $data['visit']->time ;
            $newIncome->save() ;
            $balance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $balance->balance + $newIncome->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = '  زيارة من المريض  ' . $data['visit']->patient->first_name . ' ' . $data['visit']->patient->last_name ;
            $newBalance->save() ;

            return view('visits.SingleVisit')->with($data);
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
