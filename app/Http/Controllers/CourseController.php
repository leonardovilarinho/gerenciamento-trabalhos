<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;

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

        return view('course.disciplines', compact('disciplines', 'course'));
    }
}
