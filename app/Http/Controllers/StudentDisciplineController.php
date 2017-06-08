<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Student, User, Course};
use Illuminate\Support\Facades\DB;

class StudentDisciplineController extends Controller
{
    public function index()
 	{
   		$courses = Course::all()->keyBy('id')->toArray();
        foreach ($courses as $key => $value) {
            $courses[$key] = $value['name'];
        }

        $links = [];

        $linkk = DB::table('disciplines_students')
        ->select('*')
        ->get();

        foreach ($linkk as $value) {
            if($value->student_id != null) {
                $d = Discipline::find($value->discipline_id);
                $s = User::find($value->student_id);

                $links[] = [
                    'student' => $s->name,
                    'student_id' => $s->id,
                    'discipline' => $d->name,
                    'course' => Course::find($value->course_id)->name,
                    'course_id' => $value->course_id,
                    'discipline_id' => $d->id,
                ];
            }
        }

 	  	return view('student.include', compact('courses', 'links'));
 	}

    public function pt2(Request $request)
    {
        $course = Course::find($request->course);
        $disciplines = [];

        foreach ($course->disciplines as $key => $value) {
            $t = DB::table('disciplines_students')
                ->select('student_id')
                ->where('course_id', $course->id)
                ->where('discipline_id', $value->id)
            ->first();

            $disciplines[] = [
                'id' => $value->id,
                'name' =>  $value->name,
            ];
        }

        $students = Student::all()->keyBy('user_id')->toArray();
        foreach ($students as $key => $value) {
            $user =  User::find($key);
            $students[$key] = $user->name;
        }

        return view('student.include2', compact('course', 'disciplines', 'students'));
    }


	public function store(Request $request)
	{
        foreach ($request->disciplines as $discipline) {
            DB::table('disciplines_students')
            ->insert([
                'student_id' => $request->student_id,
                'discipline_id' => $discipline,
                'course_id' => $request->course_id
            ]);
        }

        return redirect('include/displine/student')->withMsg('Estudante incluido nas matérias');
  	}


    public function delete($course, $discipline, $student){
    	 DB::table('disciplines_students')
            ->where('course_id', $course)
            ->where('discipline_id', $discipline)
            ->where('student_id', $student)
        ->delete();
    	return redirect('include/displine/student')->withMsg('Vinculo foi excluído');
    }
}
