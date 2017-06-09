<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Course, Room};

class DisciplineController extends Controller
{
  	public function index()
 	{
   		$disciplines = Discipline::paginate(5);
        $courses = Course::all();

 	  	return view('discipline.discipline',compact('disciplines', 'courses'));
 	}

	public function store(Request $request)
	{
        $d = Discipline::where('name', $request->name)->first();
        if(!$d)
	       $d = Discipline::create($request->only('name'));

        foreach ($request->courses as $course) {
            $d->courses()->attach($course, ['teacher_id' => null]);
        }

        return redirect('discipline/new');
  	}

    public function edit($id){
    	$discipline = Discipline::find($id);
        $select = $discipline->courses->pluck('id')->toArray();
        $courses = Course::all();
    	return view('discipline.edit',compact('discipline', 'courses', 'select'));
    }

    public function update(Request $request, $id){
        $discipline = Discipline::find($id);
        $select = $discipline->courses->pluck('id')->toArray();

        foreach ($select as $s) {
            if(!in_array($s, $request->course))
                $discipline->courses()->detach($s);
        }

        foreach ($request->course as $c) {
            if(!in_array($c, $select))
                $discipline->courses()->attach($c);
        }

    	Discipline::find($id)->update($request->all());
    	return redirect('/discipline/new')->withMsg('Editado com sucesso');
    }

    public function delete($id){
    	Discipline::find($id)->delete();
    	return redirect('/discipline/new');
    }

    public function works($course, $disc)
    {
        $room = Room::where('course_id', $course)->where('discipline_id', $disc)->first();
        return view('discipline.works', compact('room'));
    }
}
