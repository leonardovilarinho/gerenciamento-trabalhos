<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
use App\Model\{User, Course, Room};
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

        $rooms = Room::all();
        $user = User::find($id);

        return view('link.rooms_teacher', compact('type', 'user', 'rooms', 'id'));
    }


    public function linkGo(Request $request, $id)
    {

        $user = User::find($id);
        $rooms = Room::where('teacher_id', $id)->get();

        foreach ($rooms as $room) {
            $room->teacher_id = null;
            $room->save();
        }

        if($request->has('rooms')) {
            foreach ($request->rooms as $room) {
                $r = Room::find($room);
                $r->teacher_id = $id;
                $r->save();
            }
        }

        return redirect('teacher/new')->withMsg($user->name . ' foi vinculado!');
    }
}
