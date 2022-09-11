<?php

namespace App\Http\Controllers\taken;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexTakenController extends Controller
{
    public function index()
    {
        try {

            $data['takens'] = DB::table('takens')
                ->orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(20);
            $data['route'] = 'search.taken' ;
            return view('takens.takens')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
