<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class EditExpensePageController extends Controller
{
    public function get_page($id)
    {
        $expense = Expense::where('id', $id)->first();
        return view('expenses.EditExpense', [
            'id' => $expense->id,
            'cost' => $expense->cost,
            'description' => $expense->description,
            'date' => $expense->date,
            'time' => $expense->time
        ]);
    }
}
