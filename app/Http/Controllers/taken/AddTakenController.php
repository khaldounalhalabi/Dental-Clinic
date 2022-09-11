<?php

namespace App\Http\Controllers\taken;

use App\Http\Controllers\Controller;
use App\Models\Taken;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddTakenController extends Controller
{
    public function add(Request $request)
    {
        try {

            $rules = [
                'description' => 'required|min:2',
                'value' => 'numeric|required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return view('takens.AddTaken')->with($data);
            }

            $taken = new Taken;
            $taken->description = $request->description;
            $taken->value = $request->value;
            $taken->date = $request->date;
            $taken->time = $request->time;
            $taken->save();

            $balance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $balance->balance + $taken->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = $taken->description;
            $newBalance->save();

            return redirect()->route('index.takens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
