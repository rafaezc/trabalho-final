<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }  
     
    public function authenticate(Request $request)
    {
        $request->only('email', 'senha');

        $users_exist = User::where('email', '=', $request->email)
                        ->where('senha', '=', $request->senha)
                        ->get(['codigo_usuario', 'nome', 'id']);

        $query_result = count($users_exist);
                   
        if ($query_result == 1) {
        
            Auth::login($users_exist[0]);

            session(['user_code' => $users_exist[0]->codigo_usuario, 'user_name' => $users_exist[0]->nome, 'user_id' => $users_exist[0]->id]);
            
            return view('welcome'); 
        
        } else {

            return redirect()->route('login.index')->with('toast_info', 'Email e/ou senha inválido(s)!');
        }
    }
   
    public function logout() 
    {
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
