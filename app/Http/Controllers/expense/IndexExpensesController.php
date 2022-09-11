<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexExpensesController extends Controller
{
    public function index()
    {
        try {
            $data['expenses'] = DB::table('expenses')
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(20);
            $data['route'] = 'search.expense';
            return view('expenses.expenses')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
