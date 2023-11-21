<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperacController extends Controller
{
    public function dashboard()
    {
        return view('operac.dashboard');
    }
}
