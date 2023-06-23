<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        try {
            DB::connection()->getPdo();
            echo "Conexão com o banco de dados estabelecida com sucesso!";
        } catch (\Exception $e) {
            die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
        }
    }
}
