<?php

namespace App\Http\Controllers\paginapublica;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class InicialController extends Controller
{
    public function display(Calendar $calendario)
    {
        $dias = $calendario::all();

        return view('welcome', [
            'agenda' => $dias,
        ]);
    }
}
