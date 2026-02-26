<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validação dos dados do formulário recebidos no request
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],[
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone deve ser preenchido',
            'email.required' => 'O campo email deve ser preenchido',
            'email.email' => 'O email informado não é válido',
            'motivo_contatos_id.required' => 'O campo motivo contato deve ser preenchido',
            'mensagem.required' => 'O campo mensagem deve ser preenchido',
            'mensagem.max' => 'O campo mensagem deve conter no máximo 2000 caracteres'
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
