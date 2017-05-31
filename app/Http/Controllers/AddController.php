<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Teacher, User, Course};
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    public function index()
 	{
   		$courses = Course::all()->keyBy('id')->toArray();
        foreach ($courses as $key => $value) {
            $courses[$key] = $value['name'];
        }

        $links = [];

        $linkk = DB::table('courses_disciplines')
        ->select('*')
        ->get();

        foreach ($linkk as $value) {
            if($value->teacher_id != null) {
                $d = Discipline::find($value->discipline_id);

                $links[] = [
                    'teacher' => User::find($value->teacher_id)->name,
                    'discipline' => $d->name,
                    'course' => Course::find($value->course_id)->name,
                    'course_id' => $value->course_id,
                    'discipline_id' => $d->id,
                ];
            }
        }

 	  	return view('teacher.include', compact('courses', 'links'));
 	} 

    public function pt2(Request $request)
    {
        $course = Course::find($request->course);
        $disciplines = [];

        foreach ($course->disciplines as $key => $value) {
            $t = DB::table('courses_disciplines')
                ->select('teacher_id')
                ->where('course_id', $course->id)
                ->where('discipline_id', $value->id)
            ->first();
            $disciplines[] = [
                'id' => $value->id,
                'name' =>  $value->name,
                'checked' => $t->teacher_id != null ? ' *' : ''
            ];
        }

        $teachers = Teacher::all()->keyBy('user_id')->toArray();
        foreach ($teachers as $key => $value) {
            $user =  User::find($key);
            $teachers[$key] = $user->name;
        }

        return view('teacher.include2', compact('course', 'disciplines', 'teachers'));
    } 


	public function store(Request $request)
	{
        foreach ($request->disciplines as $discipline) {
            DB::table('courses_disciplines')
                ->where('course_id', $request->course_id)
                ->where('discipline_id', $discipline)
            ->update(['teacher_id' => $request->teacher_id]);
        }

        return redirect('include/displine/teacher')->withMsg('Professor incluido nas matérias');
  	}

   
    public function delete($course, $discipline){
    	 DB::table('courses_disciplines')
            ->where('course_id', $course)
            ->where('discipline_id', $discipline)
        ->update(['teacher_id' => null]);
    	return redirect('include/displine/teacher')->withMsg('Vinculo foi excluído');
    }
}
