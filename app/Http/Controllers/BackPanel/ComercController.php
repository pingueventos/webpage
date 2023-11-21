<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComercController extends Controller
{
    public function dashboard()
    {
        return view('comerc.dashboard');
    }
}
