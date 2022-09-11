<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditPatientProfileController extends Controller
{
    public function edit(Request $request)
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
            $data = $request->only(
                'id',
                'first_name',
                'last_name',
                'notes',
                'birth_date',
                'home_number',
                'phone_number',
                'city',
                'street'
            );
            if ($data) {

                $validator = Validator::make($data, $rules);

                if ($validator->fails()) {
                    $errors['errors'] = $validator->errors();
                    return back()->with($errors);
                }

                $patient = Patient::where('id', $request->id)->first();
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
                    $image_name = $request->file('image')->getClientOriginalName();

                    $temp = Image::where('patient_id' , $request->id)->first() ;

                    if($temp){
                        $image = $temp ;
                    } else {
                        $image = new Image ;
                    }

                    // if (!isset($patient->images->image)) {
                    //     $image = new Image;
                    // } else {
                    //     $image = Image::where('patient_id', $request->id)->first();
                    // }

                    $image->image = $destenation_path . '/' . $image_name;
                    $image->patient_id = $patient->id;
                    $image->save();
                    $path = $request->file('image')->storeAs('public/'.$destenation_path, $image_name);
                }
                return back();
            }
        } catch (\Exception $e) {
            $errors['server_error'] = $e->getMessage();
            return back()->with($errors);
        }
    }
}
