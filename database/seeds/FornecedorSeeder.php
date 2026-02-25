<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'www.fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'contato@fornecedor1.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'www.fornecedor2.com.br',
            'uf' => 'RJ',
            'email' => 'contato@fornecedor2.com.br'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'www.fornecedor3.com.br',
            'uf' => 'MG',
            'email' => 'contato@fornecedor3.com.br'
        ]);
    }
}
