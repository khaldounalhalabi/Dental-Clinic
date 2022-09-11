<?php

namespace App\Http\Controllers\income;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteIncomeController extends Controller
{
    public function delete($id)
    {
        try {
            $income = Income::where('id', $id)->first();
            $newBalance = new Wallet ;
            $lastBalance = Wallet::latest()->first() ;
            $newBalance->balance = $lastBalance->balance - $income->value ;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d') ;
            $newBalance->notes = 'لقد حذفت قيمة دخل سابق' ;
            $newBalance->save() ;
            $income->delete();
            return redirect()->route('index.incomes');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
