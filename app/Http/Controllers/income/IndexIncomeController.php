<?php

namespace App\Http\Controllers\income;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexIncomeController extends Controller
{
    public function index()
    {
        try{

            $data['incomes'] = DB::table('incomes')->orderBy('date' , 'DESC')->orderBy('time' , 'DESC')->paginate(20) ;
            $data['route'] = 'search.income' ;
            return view('incomes.incomes')->with($data) ;
        }
        catch(\Exception $e){
            return response($e->getMessage()) ;
        }
    }
}
