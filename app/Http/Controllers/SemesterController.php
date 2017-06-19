<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Room;

class SemesterController extends Controller
{
    public function index()
    {
    	$rooms = Room::all();

    	return view('discipline.semester', compact('rooms'));
    }

    public function store(Request $request)
    {
    	$rooms = Room::all();

    	if($request->has('semesters')) {
    		foreach ($request->semesters as $semester) {

    			foreach ($rooms as $key => $room) {
    				$room->semester = $semester;
    				$room->save();
    				unset($rooms[$key]);
    				break;
    			}
    		}
    	}

    	return redirect('/semester/new')->withMsg('Salvo!');
    }	
}
