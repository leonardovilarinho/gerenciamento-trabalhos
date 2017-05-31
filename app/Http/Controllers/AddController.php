<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Teacher, User};

class AddController extends Controller
{
    public function index()
 	{
   		$disciplines = Discipline::paginate(5);
        $teachers = Teacher::all()->keyBy('user_id')->toArray();
        foreach ($teachers as $key => $value){
            $teachers[$key] = User::where('id', $value['user_id'])->first();
        }
 	  	return view('teacher.include', compact('teachers'));
 	} 

	// public function store(Request $request)
	// {
 //        $d = Discipline::where('name', $request->name)->first();
 //        if(!$d)
	//        $d = Discipline::create($request->only('name'));

 //        $d->courses()->attach($request->teacher);
 //        return redirect('teacher/new');
 //  	}

    // public function edit($id){
    // 	$discipline = Discipline::find($id);
    //     $select = $discipline->teachers->pluck('id')->toArray();
    //     $teachers = Teacher::all();
    // 	return view('discipline.edit',compact('discipline', 'teachers', 'select')); 
    // }

    // public function update(Request $request, $id){
    //     $discipline = Discipline::find($id);
    //     $select = $discipline->teacher->pluck('id')->toArray();

    //     foreach ($select as $s) {
    //         if(!in_array($s, $request->teacher))
    //             $teacher->displine()->detach($s);
    //     }

    //     foreach ($request->teacher as $c) {
    //         if(!in_array($c, $select))
    //             $discipline->courses()->attach($c);
    //     }
    // 	Discipline::find($id)->update($request->all());
    // 	return redirect('/teacher/new')->withMsg('Editado com sucesso');
    // }

 //    public function delete($id){
 //    	Discipline::find($id)->delete();
 //    	return redirect('/discipline/new');
 //    }
}
