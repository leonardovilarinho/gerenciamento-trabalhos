<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Manager;

class PanelController extends Controller
{
    public function start()
    {
    	return view('panel.start');
    }
}
