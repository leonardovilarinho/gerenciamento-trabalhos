<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Manager;
use App\Http\Requests\UserRequest;

class InstalacaoController extends Controller
{
    public function defineAcesso()
    {
    	return Manager::all()->count() <= 0;
    }

    public function inicioForm()
    {
    	if($this->defineAcesso())
    		return view('managers.primeiro');
    	else
    		return redirect('');
    }

    public function registroPrimeiroAcesso(UserRequest $request)
    {
        if($this->defineAcesso())
        {
            $usuario = User::create(
                $request->only('name') + [
                    'username' => trim( strtolower( $request->input('username') ) ),
                    'password' => bcrypt( $request->input('password') ),
                    'email' => trim( strtolower( $request->input('email') ) ),
                ]
            );
            Manager::create(['user_id' => $usuario->id]);
        }
    	return redirect('');
    }
}
