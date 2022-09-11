<?php

namespace App\Http\Controllers\visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class ShowVisitController extends Controller
{
    public function show($id)
    {
        try {

            $data['visit'] = Visit::where('id', $id)->first();
            return view('visits.SingleVisit')->with($data);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
