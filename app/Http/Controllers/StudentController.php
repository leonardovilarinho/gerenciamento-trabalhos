<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Model\Student;
use App\Model\User;
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
}
