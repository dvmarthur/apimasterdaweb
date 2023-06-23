<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomesProdutos = [
            'Smartphone',
            'Televisor',
            'Notebook',
            'Fones de ouvido',
            'Câmera digital',
        ];

        foreach ($nomesProdutos as $nome) {
            Produto::create(['nome' => $nome]);
        }
    }
}
