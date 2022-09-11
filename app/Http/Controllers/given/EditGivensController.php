<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use App\Models\Given;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditGivensController extends Controller
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
                return view('givens.EditGiven')->with($data);
            }

            $given = Given::where('id', $id)->first();

            $lastBalance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $lastBalance->balance + $given->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = 'لقد قمت بالتعديل على سند دفع سابق';

            $given->description = $request->description;
            $given->value = $request->value;
            $given->date = $request->date;
            $given->time = $request->time;

            $newBalance->balance = $newBalance->balance - $given->value;
            $newBalance->save();

            $given->save();

            return redirect()->route('index.givens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
