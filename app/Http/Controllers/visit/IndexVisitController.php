<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexVisitController extends Controller
{
    public function index()
    {
        try {

            $data['visits'] = Visit::orderBy('date', 'DESC')
                ->orderBy('time', 'DESC')
                ->paginate(20);
            $data['route'] = 'search.visit' ;
            return view('visits.visits')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
