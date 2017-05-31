<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Model\Teacher;
use App\Model\User;
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
    $senha = str_random(8);
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
}
