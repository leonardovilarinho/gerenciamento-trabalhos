<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\{Manager, Course, RoomStudent};
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function start()
    {
    	if(auth()->user()->student) {
    		$links = [];

	        $rooms_student = RoomStudent::where('student_id', auth()->user()->id)->get();
    		return view('panel.student', compact('rooms_student'));
    	}
    	return view('panel.start');
    }
}
