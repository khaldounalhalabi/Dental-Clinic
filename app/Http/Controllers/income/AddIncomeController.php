<?php

namespace App\Http\Controllers\income;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddIncomeController extends Controller
{
    public function add(Request $request)
    {
        try {

            $rules = [
                'description' => 'required|min:2',
                'cost' => 'numeric|required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return view('incomes.AddIncome')->with($data);
            }

            $income = new Income;
            $income->description = $request->description;
            $income->value = $request->cost;
            $income->date = $request->date;
            $income->time = $request->time;
            $income->save();

            $balance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $balance->balance + $income->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = $income->description ;
            $newBalance->save() ;

            return redirect()->route('index.incomes');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
