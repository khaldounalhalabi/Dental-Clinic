<?php

namespace App\Http\Controllers\income;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchIncomesController extends Controller
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


            $data['incomes'] = DB::table('incomes')
                ->where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('date' , 'DESC')
                ->orderBy('time' , 'DESC')
                ->paginate(31);

            $totalIncomes = 0;

            foreach ($data['incomes'] as $in) {
                $totalIncomes += $in->value;
            }

            $data['total'] = $totalIncomes;
            $data['route'] = 'search.income';

            return view('incomes.incomes')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
