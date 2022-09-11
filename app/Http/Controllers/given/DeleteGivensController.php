<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use App\Models\Given;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteGivensController extends Controller
{
    public function delete($id)
    {
        try {
            $given = Given::where('id', $id)->first();
            $lastBalance = Wallet::latest()->first();
            $newBalance = new Wallet;
            $newBalance->balance = $lastBalance->balance + $given->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = 'لقد حذفت سند دفع سابق';
            $newBalance->save();
            $given->delete();
            return redirect()->route('index.givens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
