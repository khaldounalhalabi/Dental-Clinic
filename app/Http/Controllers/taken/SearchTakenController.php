<?php

namespace App\Http\Controllers\taken;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchTakenController extends Controller
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


            $data['takens'] = DB::table('takens')
                ->where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(31);

            $totaltakens = 0;

            foreach ($data['takens'] as $take) {
                $totaltakens += $take->value;
            }

            $data['total'] = $totaltakens;
            $data['route'] = 'search.taken';

            return view('takens.takens')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
