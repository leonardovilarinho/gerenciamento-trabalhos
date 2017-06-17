<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Course, Room, RoomStudent};

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);
        return view('course.course',compact('courses'));
    }

    public function store(Request $request)
    {
        Course::create($request->all());
        return redirect('course/new');
    }

    public function edit($id){
        $course = Course::find($id);
        return view('course.edit',compact('course'));
    }

    public function update(Request $request, $id){
        Course::find($id)->update($request->all());
        return redirect('/course/new');
    }

    public function delete($id){
        Course::find($id)->delete();
        return redirect('/course/new');
    }

    public function disciplines($id)
    {
        $course = Course::find($id);
        $disciplines = $course->disciplines;

        foreach ($disciplines as $key => $discipline) {
            $room = Room::where('course_id', $id)->where('discipline_id', $discipline->id)->first();

            $exist = RoomStudent::where('room_id', $room->id)->where('student_id', auth()->user()->id)->first();

            if(!$exist)
                unset($disciplines[$key]);
        }

        return view('course.disciplines', compact('disciplines', 'course'));
    }
}
