<?php

namespace App\Http\Controllers\taken;

use App\Http\Controllers\Controller;
use App\Models\Taken;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteTakenController extends Controller
{
    public function delete($id)
    {
        try {
            $taken = Taken::where('id', $id)->first();
            $newBalance = new Wallet;
            $lastBalance = Wallet::latest()->first();
            $newBalance->balance = $lastBalance->balance - $taken->value;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d');
            $newBalance->notes = 'لقد حذفت قيمة سند قبض سابق';
            $newBalance->save();
            $taken->delete();
            return redirect()->route('index.takens');
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
