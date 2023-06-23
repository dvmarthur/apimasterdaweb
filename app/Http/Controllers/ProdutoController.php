<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function GetProdutos()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }
}
