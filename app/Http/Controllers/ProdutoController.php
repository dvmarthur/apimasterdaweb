<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function store(Request $request)
    {
        $itensPedido = $request->input('itens');

        $codigoPedido = Str::uuid()->toString();
        foreach ($itensPedido as $item) {
            $produtoId = $item['produto_id'];
            $quantidade = $item['quantidade'];

            $pedido = Pedido::create([
                'produto_id' => $produtoId,
                'codigo_pedido' => $codigoPedido,
                'quantidade' => $quantidade,
            ]);

            // Faça qualquer lógica adicional necessária para cada pedido criado
        }

        return response()->json($pedido);
    }
}
