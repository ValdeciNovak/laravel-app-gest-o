<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha inválidos';
        }   
        if($request->get('erro') == 2){
            $erro = 'É necessário realizar login para acessar a página.';
        }   

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){

    $regras = [
        'usuario' => 'email',
        'senha' => 'required'
    ];

    $feedback = [
        'usuario.email' => 'O campo usuário deve ser um email válido',
        'senha.required' => 'O campo senha é obrigatório'
    ];

    $request->validate($regras, $feedback);

    $email = $request->get('usuario');
    $password = $request->get('senha');

    echo "Email: $email | Senha: $password";

    $user = new User();
    $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

    if(isset($usuario->name)){
        session_start();
        $_SESSION['nome'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;
        return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
    }
    }
    
    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
        }
    }
