<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Manager;

class AuthController extends Controller
{
    public function panelLogin()
    {
        if(Manager::all()->count() <= 0)
            return redirect('primeiro-acesso');

    	if(auth()->check())
    		return redirect('panel');

    	return view('login');
    }

    public function into(Request $request)
    {
    	$login = trim( $request->input('login') );
    	$login = strtolower( $login );
    	$password = $request->input('password');

    	$user = User::where('username', $login)
    		->orWhere('email', $login)
    	->first();

    	if(!$user or !password_verify($password, $user->password))
    		return view('login')->withErro('Usuário não encontrado');

    	auth()->login($user);
    	return redirect('panel');
    }

    public function sair()
    {
    	auth()->logout();

    	return redirect('');
    }

}
