<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexGivensController extends Controller
{
    public function index()
    {
        try {
            $data['givens'] = DB::table('givens')
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(20);
            $data['route'] = 'search.given' ;
            return view('givens.givens')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
