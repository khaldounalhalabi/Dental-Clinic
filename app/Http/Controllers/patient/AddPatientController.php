<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddPatientController extends Controller
{
    public function add(Request $request)
    {
        try {

            $rules = [
                'first_name' => 'string|max:20|min:3|required',
                'last_name' => 'string|max:20|min:3|required',
                'notes' => 'nullable|min:3|max:10000',
                'birth_date' => 'required',
                'home_number' => 'string|max:10|min:7|nullable',
                'phone_number' => 'string|max:14|min:10|nullable',
                'city' => 'string|min:3|max:25|nullable',
                'street' => 'string|min:3|max:100|nullable',


            ];
            $data = $request->all();
            if ($data) {

                $validator = Validator::make($data, $rules);

                if ($validator->fails()) {
                    $errors['errors'] = $validator->errors();
                    return back()->with($errors);
                }

                $patient = new Patient;
                $patient->first_name = $request->first_name;
                $patient->last_name = $request->last_name;
                $patient->notes = $request->notes;
                $patient->birth_date = $request->birth_date;
                $patient->home_number = $request->home_number;
                $patient->phone_number = $request->phone_number;
                $patient->city = $request->city;
                $patient->street = $request->street;
                $patient->save();
                if ($request->hasFile('image') != null) {
                    $destenation_path = 'patients/images';
                    $image_name = $request->file('image')->getClientOriginalName() ;
                    $image = new Image;
                    $image->image = $destenation_path . '/' . $image_name;
                    $image->patient_id = $patient->id;
                    $image->save();
                    $path = $request->file('image')->storeAs('public/'.$destenation_path, $image_name);
                }

                $p['patient'] = $patient;
                $p['age'] = Carbon::parse($p['patient']->birth_date)->diff(Carbon::now())->y;
                $p['images'] = $patient->images ;

                return redirect()->route('patient', $p['patient']);
            }
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
