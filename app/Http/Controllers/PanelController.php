<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function start()
    {
    	return view('panel.start');
    }
}
