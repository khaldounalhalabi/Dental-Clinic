<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPatientController extends Controller
{
    public function index()
    {
        try {

            $data['patients'] = DB::table('patients')
                ->orderBy('first_name', 'ASC')
                ->orderBy('last_name', 'DESC')
                ->orderBy('birth_date', 'ASC')
                ->paginate(20);

            if (isset($data['patients'])) {
                return view('patients.patients')->with($data);
            } else {
                $data['message'] = 'You have no patients recorded';
                return view('patients')->with($data);
            }
        } catch (\Exception $e) {
            $data['server_error'] = $e->getMessage();
            return view('patients')->with($data);
        }
    }
}
