<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteExpenseController extends Controller
{
    public function delete($id)
    {
        try{
            $expense = Expense::where('id' , $id)->first();
            $lastBalance = Wallet::latest()->first() ;
            $newBalance = new Wallet ;
            $newBalance->balance = $lastBalance->balance + $expense->cost ;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d') ;
            $newBalance->notes = 'لقد حذفت سجل صرف سابق' ;
            $newBalance->save() ;
            $expense->delete() ;
            return redirect()->route('index.expenses') ;
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
