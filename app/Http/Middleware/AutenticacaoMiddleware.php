<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_de_autenticacao, $perfil)
    {
        if($metodo_de_autenticacao == 'padrao'){
            echo 'Verificação de autenticação padrão - Perfil: '.$perfil.'<br>';
        }

        if(false){
            return $next($request);
        }else{
        
        // return $next($request);
        return Response('Acesso negado. Você não tem permissão para acessar esta página.');
    }}
}
