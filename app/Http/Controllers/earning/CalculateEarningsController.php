<?php

namespace App\Http\Controllers\earning;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;

class CalculateEarningsController extends Controller
{
    public function calculate(Request $request)
    {
        try {

            $rules = [
                'start_date' => 'before_or_equal:now|required',
                'end_date' => 'before_or_equal:now|required',
            ];

            $validator = Validator::make($request->only('start_date' , 'end_date') , $rules) ;

            if($validator->fails()){
                $data['errors'] = $validator->errors() ;
                return view('earnings.earnings')->with($data) ;
            }


            $start_date = $request->start_date;
            $end_date = $request->end_date;



            $expenses = Expense::where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->get();

            $incomes = Income::where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->get();

            $totalExpenses = 0;
            $totalIncomes = 0;

            foreach ($expenses as $e) {
                $totalExpenses += $e->cost;
            }
            foreach ($incomes as $in) {
                $totalIncomes += $in->value;
            }

            $data['earnings'] = $totalIncomes - $totalExpenses;
            $data['totalExpenses'] = $totalExpenses ;
            $data['totalIncomes'] = $totalIncomes ;

            return view('earnings.earnings')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
