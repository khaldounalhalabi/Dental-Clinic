<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddExpenseController extends Controller
{
    public function add(Request $request)
    {
        try{

            $rules = [
                'description' => 'required|min:2' ,
                'cost' => 'numeric|required' ,
            ] ;

            $validator = Validator::make($request->all() , $rules) ;

            if($validator->fails()){
                $data['errors'] = $validator->errors() ;
                return view('expenses.AddExpense')->with($data) ;
            }

            $expense = new Expense ;
            $expense->description = $request->description ;
            $expense->cost = $request->cost ;
            $expense->date = $request->date ;
            $expense->time = $request->time ;
            $expense->save() ;

            $balance = Wallet::latest()->first();
            $newBalance = new Wallet ;
            $newBalance->balance = $balance->balance - $expense->cost ;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d') ;
            $newBalance->notes = $expense->description ;
            $newBalance->save() ;

            return redirect()->route('index.expenses') ;

        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
