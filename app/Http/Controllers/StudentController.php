<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\{User, Room, RoomStudent};
use App\Http\Requests\{TeacherRequest, UserRequest};


class StudentController extends Controller
{
    public function index()
    {
        if(auth()->user()->student)
            return redirect('/error');

        $students = Student::paginate(5);
        return view('student.student',compact('students'));
    }

    public function delete($id)
    {
        if(auth()->user()->student)
            return redirect('/error');

        User::find($id)->delete();
        return redirect('student/new');
    }


    public function store(UserRequest $request)
    {
        if(auth()->user()->student)
            return redirect('/error');

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

        $user->username = strtolower('alu'.$request->ano.str_pad($user->id, 4, '0', STR_PAD_LEFT));
        $user->save();
        Student::create(['user_id' => $user->id]);
        return redirect('student/new');
    }

    public function update(TeacherRequest $request, $id)
    {
        if(auth()->user()->student)
            return redirect('/error');

        User::find($id)->update($request->except('password'));
        return redirect('student/new');
    }

    public function edit($id)
    {
        if(auth()->user()->student)
            return redirect('/error');

        $student = User::find($id);
        return view('student.edit',compact('student'));
    }

    public function link($id)
    {
        $type = 'student';
        $rooms = Room::all();
        $user = User::find($id);
        $exists = RoomStudent::where('student_id', $user->id)->pluck('room_id')->toArray();
        return view('link.rooms', compact('type', 'user', 'rooms', 'exists'));
    }

    public function linkGo(Request $request, $id)
    {
        $type = 'student';

        $user = User::find($id);
        $rooms = RoomStudent::where('student_id', $id)->delete();

        foreach ($request->rooms as $room) {
            $r = RoomStudent::where('student_id', $user->id)->where('room_id', $room)->first();

            if(!$r)
                RoomStudent::create(['student_id' => $user->id, 'room_id' => $room]);
        }

        return redirect('student/new')->withMsg($user->name . ' foi vinculado!');
    }
}
