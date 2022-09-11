<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use App\Models\Given;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddGivensController extends Controller
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
                return view('expenses.AddGiven')->with($data);
            }

            $given = new Given;
            $given->description = $request->description;
            $given->value = $request->value;
            $given->date = $request->date;
            $given->time = $request->time;
            $given->save();

            $balance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $balance->balance - $given->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = $given->description;
            $newBalance->save();

            return redirect()->route('index.givens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
