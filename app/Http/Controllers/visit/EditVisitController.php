<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditVisitController extends Controller
{
    public function edit(Request $request, $id)
    {
        try {

            $rules = [
                'type' => 'nullable|string',
                'cost' => 'numeric',
                'date' => 'required',
                'time' => 'nullable'
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errors['errors'] = $validator->errors();
                return redirect()->route('show.visit', ['id' => $id])->with($errors);
            }

            $data['visit'] = Visit::where('id', $id)->first();

            $data['visit']->type = $request->type;
            $data['visit']->description = $request->description;
            $data['visit']->prescription = $request->prescription;
            $data['visit']->procedure = $request->procedure;
            $data['visit']->date = $request->date;
            $data['visit']->time = $request->time;

            if ($data['visit']->cost != $request->cost) {

                $lastBalance = Wallet::latest()->first();
                $newBalance = new Wallet;
                $newBalance->balance = $lastBalance->balance - $data['visit']->cost;
                $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
                $newBalance->notes = 'لقد قمت بالتعديل على سجل زيارة سابق';
                $data['visit']->cost = $request->cost;
                $newBalance->balance = $newBalance->balance + $data['visit']->cost ;
                $newBalance->save() ;
            }


            $data['visit']->save();
            return view('visits.SingleVisit')->with($data);
        } catch (\Exception $e) {

            return response($e->getMessage());
        }
    }
}
