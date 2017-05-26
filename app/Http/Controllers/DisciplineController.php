<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Discipline;

class DisciplineController extends Controller
{
  	public function index()
 	{
   		$disciplines = Discipline::all();
 	  	return view('discipline.discipline',compact('disciplines'));
 	} 

	public function store(Request $request)
	{
	    Discipline::create($request->all());
	    return redirect('discipline/new');
  	}

    public function edit($id){
    	$discipline = Discipline::find($id);
    	return view('discipline.edit',compact('discipline')); 
    }

    public function update(Request $request, $id){
    	Discipline::find($id)->update($request->all());
    	return redirect('/discipline/new');
    }

    public function delete($id){
    	Discipline::find($id)->delete();
    	return redirect('/discipline/new');
    }
}
