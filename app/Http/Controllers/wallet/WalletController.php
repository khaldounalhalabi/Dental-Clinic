<?php

namespace App\Http\Controllers\wallet;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        try {
            $data['wallets'] = Wallet::orderBy('date', 'DESC')
                ->orderBy('created_at', 'DESC')
                ->paginate(30);
            $data['route'] = 'search.wallet';
            return view('wallets.wallets')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
