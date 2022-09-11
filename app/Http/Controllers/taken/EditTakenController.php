<?php

namespace App\Http\Controllers\taken;

use App\Http\Controllers\Controller;
use App\Models\Taken;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditTakenController extends Controller
{
    public function edit(Request $request, $id)
    {
        try {

            $rules = [
                'description' => 'required|min:2',
                'value' => 'numeric|required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return view('takens.EditTaken')->with($data);
            }

            $taken = Taken::where('id', $id)->first();

            $lastBalance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $lastBalance->balance - $taken->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = 'لقد قمت بالتعديل على سند قبض سابق';


            $taken->description = $request->description;
            $taken->value = $request->value;
            $taken->date = $request->date;
            $taken->time = $request->time;

            $newBalance->balance = $newBalance->balance + $taken->value;
            $newBalance->save();

            $taken->save();

            return redirect()->route('index.takens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
