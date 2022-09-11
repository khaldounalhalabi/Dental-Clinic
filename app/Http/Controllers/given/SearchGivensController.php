<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchGivensController extends Controller
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


            $data['givens'] = DB::table('givens')
            ->where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(31);

            $totalgivens = 0;

            foreach ($data['givens'] as $gi) {
                $totalgivens += $gi->value;
            }

            $data['total'] = $totalgivens;
            $data['route'] = 'search.given';

            return view('givens.givens')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
