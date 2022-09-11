<?php

namespace App\Http\Controllers\income;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditIncomeController extends Controller
{
    public function edit(Request $request, $id)
    {
        try {

            $rules = [
                'description' => 'required|min:2',
                'cost' => 'numeric|required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return view('incomes.EditIncome')->with($data);
            }

            $income = Income::where('id', $id)->first();

            $lastBalance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $lastBalance->balance - $income->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = 'لقد قمت بالتعديل على سجل دخل سابق';


            $income->description = $request->description;
            $income->value = $request->cost;
            $income->date = $request->date;
            $income->time = $request->time;

            $newBalance->balance = $newBalance->balance + $income->value ;
            $newBalance->save() ;

            $income->save();

            return redirect()->route('index.incomes');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
