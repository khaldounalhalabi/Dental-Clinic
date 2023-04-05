<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainPanelController extends Controller
{
    public function main_panel(Request $request)
    {
        try {
            $data['reservations'] = Reservation::where('date', Carbon::now('Asia/Damascus')->format('Y-m-d'))
                ->where('status', 'waiting')
                ->orderBy('date', 'ASC')
                ->paginate(7);
            $data['balance'] =
                DB::table('wallets')
                    ->orderBy('created_at', 'DESC')
                    ->first();
            $data['date'] = Carbon::now('Asia/Damascus')->format('Y-m-d');
            return view('mainpanel')->with($data);
        } catch (\Exception $e) {
            $data['server_error'] = $e->getMessage();
            return view('mainpanel')->with($data);
        }
    }
}
