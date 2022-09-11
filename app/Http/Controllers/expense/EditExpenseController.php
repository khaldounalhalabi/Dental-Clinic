<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditExpenseController extends Controller
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
                return view('expenses.EditExpense')->with($data);
            }

            $expense = Expense::where('id' , $id)->first() ;

            $lastBalance = Wallet::latest()->first() ;
            $newBalance = new Wallet ;
            $newBalance->balance = $lastBalance->balance + $expense->cost ;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d') ;
            $newBalance->notes = 'لقد قمت بالتعديل على سجل صرف سابق' ;

            $expense->description = $request->description;
            $expense->cost = $request->cost;
            $expense->date = $request->date;
            $expense->time = $request->time;

            $newBalance->balance = $newBalance->balance - $expense->cost;
            $newBalance->save();

            $expense->save();

            return redirect()->route('index.expenses');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
