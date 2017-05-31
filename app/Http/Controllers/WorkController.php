<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Work, User, Course};
use Illuminate\Support\Facades\DB;
use App\Http\Requests\{WorkRequest};
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
 	{
        if(!auth()->user()->teacher)
            return redirect('/error');

        $works = [];

        $links = [];

        $linkk = DB::table('courses_disciplines')
	        ->where('teacher_id', auth()->user()->id)
	        ->select('*')
        ->get();

        $courses = [];

        foreach ($linkk as $value) {
        	$courses[$value->course_id] = Course::find($value->course_id)->name;
            $w = Work::where('course_id', $value->course_id)
            ->where('discipline_id', $value->discipline_id)->first();
            if($w)
                $works[] = $w;
        }

 	  	return view('work.include', compact('courses', 'works'));
 	} 

 	public function pt2(Request $request)
    {
        return redirect('/include/work/pt2/'.$request->course);
    } 

    public function pt2View($course)
    {
        if(!auth()->user()->teacher)
            return redirect('/error');
        
        $course = Course::find($course);
        $disciplines = [];

        foreach ($course->disciplines as $key => $value) {

            $t = DB::table('courses_disciplines')
                ->select('teacher_id')
                ->where('course_id', $course->id)
                ->where('teacher_id', auth()->user()->id)
                ->where('discipline_id', $value->id)
            ->first();

            $disciplines[$value->id] = $value->name;
        }

        return view('work.include2', compact('course', 'disciplines'));
    } 

    public function store(WorkRequest $request)
	{
        if(!auth()->user()->teacher)
            return redirect('/error');

        $comment =  $request->comment != null or  $request->comment != '' ?  $request->comment : ' ';
		$work = Work::create($request->except('comment') + ['comment' =>$comment]);

		$request->pdf->storeAs('works', 'work-'.$work->id.'.pdf');

        return redirect('include/work')->withMsg('Trabalho incluido');
  	}

    public function delete($id){
        Work::destroy($id);
        Storage::delete('works/work-'.$id.'.pdf');

        return redirect('include/work')->withMsg('Trabalho excluído');
    }
}
