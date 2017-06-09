<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\User;
use \App\Model\Manager;

class AdminController extends Controller
{
    public function index()
    {
        $managers = Manager::paginate(5);
        return view('managers.index',compact('managers'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin');
    }

    public function new()
    {
        return view('managers.new');
    }

    public function store(Request $request)
    {
        $usuario = User::create(
            $request->only('name') + [
                'username' => trim( strtolower( $request->input('username') ) ),
                'password' => bcrypt( $request->input('password') ),
                'email' => trim( strtolower( $request->input('email') ) ),
            ]
        );
        Manager::create(['user_id' => $usuario->id]);

        return redirect('admin');
    }

    public function update(Request $request, $id)
    {
        if($request->password == '')
            User::find($id)->update($request->except('password'));
        else
            User::find($id)->update($request->except('password') + ['password' => bcrypt($request->password)]);
        return redirect('admin');
    }

    public function edit($id)
    {
        $manager = User::find($id);
        return view('managers.edit',compact('manager'));
    }
}
