<?php

namespace App\Http\Controllers\given;

use App\Http\Controllers\Controller;
use App\Models\Given;
use Illuminate\Http\Request;

class EditGivensPageController extends Controller
{
    public function get_page($id)
    {
        $given = Given::where('id', $id)->first();
        return view('givens.EditGiven', [
            'id' => $given->id,
            'value' => $given->value,
            'description' => $given->description,
            'date' => $given->date,
            'time' => $given->time
        ]);
    }
}
