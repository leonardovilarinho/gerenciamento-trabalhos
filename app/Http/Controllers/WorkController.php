<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Discipline, Work, User, Course, Room, Submission, SubmissionStudent};
use App\Http\Requests\{WorkRequest};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class WorkController extends Controller
{
    public function index()
 	{
        if(!auth()->user()->teacher)
            return redirect('/error');

        $rooms = Room::where('teacher_id', auth()->user()->id)->get();

 	  	return view('work.index', compact('rooms'));
 	}

    public function form()
    {
        if(!auth()->user()->teacher)
            return redirect('/error');

        $rooms = Room::where('teacher_id', auth()->user()->id)->get();
        return view('work.create', compact('rooms'));
    }

    public function store(WorkRequest $request)
	{
        if(!auth()->user()->teacher)
            return redirect('/error');
        $comment =  $request->comment != null or  $request->comment != '' ?  $request->comment : ' ';

        foreach ($request->rooms as $room) {
            $work = Work::create(
                $request->except('comment') + [
                    'comment' => $comment,
                    'room_id' => $room,
                ]
            );

            $request->pdf->storeAs('works', 'work-'.$work->id.'.pdf');
        }
        return redirect('work')->withMsg('Trabalho incluido');
  	}

    public function delete($id){
        Work::destroy($id);
        Storage::delete('works/work-'.$id.'.pdf');

        return redirect('work')->withMsg('Trabalho excluído');
    }

    public function submission($id)
    {
        $work = Work::find($id);
        $term = 0;

        if(strtotime(date('Y-m-d', strtotime($work->term))) < strtotime(date('Y-m-d')))
            $term = 2;

        $subs = Submission::where('work_id', $id)->get();

        foreach ($subs as $s) {
            $exist = SubmissionStudent::where('submission_id', $s->id)
                ->where('student_id', auth()->user()->id)
            ->first();

            if($exist)
                $term = 1;
        }

        $students = $work->room->students;

        foreach ($students as $skey => $svalue) {
            foreach ($subs as $sbkey => $sbvalue) {

                $exist = SubmissionStudent::where('submission_id', $sbvalue->id)
                    ->where('student_id', $svalue->student->id)
                ->first();

                if($exist) {
                    echo 'encontrou';
                    unset($students[$skey]);
                }
            }
        }

        return view('work.submission', compact('work', 'students', 'term', 'subs'));
    }

    public function submissionPost(Request $request, $id)
    {
        $work = Work::find($id);

        $protocol = date('YmdHis'). auth()->user()->id;
        $name = $protocol . '.' . $request->archive->extension();

        $request->archive->storeAs('submissions', 'submission-' . $name);
        $submission = Submission::create([
            'mimetype' => Input::file('archive')->getMimeType(),
            'file' => $name,
            'protocol' => $protocol,
            'value' => 0,
            'work_id' => $id
        ]);

        foreach ($request->students as $student) {
            SubmissionStudent::create([
                'student_id' => $student,
                'submission_id' => $submission->id,
            ]);
        }

        return redirect('work/'.$id.'/submission')->withMsg('Trabalho foi submetido com sucesso');
    }
}
