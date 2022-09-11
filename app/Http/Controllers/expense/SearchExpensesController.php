<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchExpensesController extends Controller
{
    public function search(Request $request)
    {
        try {
            $rules = [
                'start_date' => 'before_or_equal:now|required',
                'end_date' => 'before_or_equal:now|required',
            ];

            $validator = Validator::make($request->only('start_date', 'end_date'), $rules);

            if ($validator->fails()) {
                $data['errors'] = $validator->errors();
                return redirect()->back()->with($data);
            }


            $start_date = $request->start_date;
            $end_date = $request->end_date;


            $data['expenses'] = DB::table('expenses')
            ->where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(31);

            $totalExpenses = 0;

            foreach ($data['expenses'] as $ex) {
                $totalExpenses += $ex->cost;
            }

            $data['total'] = $totalExpenses;
            $data['route'] = 'search.expense';

            return view('expenses.expenses')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
