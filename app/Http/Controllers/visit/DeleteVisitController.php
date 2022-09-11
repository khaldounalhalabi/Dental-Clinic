<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeleteVisitController extends Controller
{
    public function delete($id)
    {
        try {
            $visit = Visit::where('id', $id)->first();
            $newBalance = new Wallet ;
            $lastBalance = Wallet::latest()->first() ;
            $newBalance->balance = $lastBalance->balance - $visit->cost ;
            $newBalance->date = Carbon::now('Asia/Damascus')->format('Y-m-d') ;
            $newBalance->notes = 'لقد حذفت سجل زيارة سابق' ;
            $newBalance->save() ;
            $visit->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
