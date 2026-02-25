<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
     
     $motivo_contatos = MotivoContato::all();

    return view('site.contato', ['titulo' => 'Contato (salvo)', 'motivo_contatos' => $motivo_contatos   ]);
    }

    public function salvar(Request $request) {

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve conter no máximo 40 caracteres.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'motivo_contato.required' => 'O campo motivo contato é obrigatório.',
            'mensagem.required' => 'O campo mensagem é obrigatório.',
            'mensagem.max' => 'O campo mensagem deve conter no máximo 2000 caracteres.'
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.contato');
    }
}
