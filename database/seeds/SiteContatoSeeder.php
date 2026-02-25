<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Contato 1';
        $contato->telefone = '11 99999-9999';
        $contato->email = 'contato@sitecontato.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Mensagem de contato 1';
        $contato->save();
        */

        factory(SiteContato::class, 20)->create();
    }
}
