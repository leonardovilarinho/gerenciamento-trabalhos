<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
use App\Model\{User, Course};
use App\Http\Requests\{TeacherRequest, UserRequest};


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('teacher.teacher',compact('teachers'));
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('teacher/new');
    }


    public function store(UserRequest $request)
    {
        // $senha = str_random(8);
        $senha = '12345678';
        $user = User::create(
            [
                'name' => $request->name,
                'username' => '....',
                'password' => bcrypt( $senha ),
                'email' => trim( strtolower( $request->email ) ),
            ]
        );

        $user->username = strtolower('prof'.$request->ano.str_pad($user->id, 4, '0', STR_PAD_LEFT));
        $user->save();
        Teacher::create(['user_id' => $user->id]);
        return redirect('teacher/new');
    }

    public function update(TeacherRequest $request, $id)
    {
        User::find($id)->update($request->except('password'));
        return redirect('teacher/new');
    }

    public function edit($id)
    {
        $teacher = User::find($id);
        return view('teacher.edit',compact('teacher'));
    }

    public function link($id)
    {
        $type = 'teacher';

        $user = User::find($id);
        $courses = Course::all()->keyBy('id')->toArray();
        foreach ($courses as $key => $course)
            $courses[$key] = $course['name'];

        return view('link.courses', compact('type', 'user', 'courses'));
    }

    public function linkGo(Request $request, $id)
    {
        $type = 'teacher';

        $user = User::find($id);
        $course = Course::find($request->course);
        $disciplines = $course->disciplines;

        return view('link.disciplines', compact('type', 'user', 'disciplines', 'course'));
    }

    public function linkFinish(Request $request, $id)
    {
        $user = User::find($id);
        $course = Course::find($request->course_id);
        $disciplines = $course->disciplines;
        foreach ($request->disciplines as $discipline) {
            $course->disciplines()->updateExistingPivot($discipline, ['teacher_id' => $user->id]);
        }

        return redirect('teacher/new')->withMsg($user->name . ' foi vinculado!');
    }
}
