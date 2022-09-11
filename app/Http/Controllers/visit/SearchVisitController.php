<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchVisitController extends Controller
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


            $data['visits'] = Visit::where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(31);

            $totalvisits = 0;

            foreach ($data['visits'] as $visit) {
                $totalvisits += $visit->cost;
            }

            $data['total'] = $totalvisits;
            $data['route'] = 'search.visit';

            return view('visits.visits')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
