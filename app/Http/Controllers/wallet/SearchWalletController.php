<?php

namespace App\Http\Controllers\wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchWalletController extends Controller
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


            $data['wallets'] = DB::table('wallets')
                ->where('date', '>=', $start_date)
                ->where('date', '<=', $end_date)
                ->orderBy('created_at', 'DESC')
                ->paginate(31);

            $data['route'] = 'search.wallet';

            return view('wallets.wallets')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
