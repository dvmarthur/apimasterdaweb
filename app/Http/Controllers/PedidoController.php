<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Str;


class PedidoController extends Controller
{
    public function GetPedidos()
    {
        $userId = auth()->id();
        $pedidos = Pedido::where('user_id', $userId)->get();
        return response()->json($pedidos);
    }

    public function CreatePedido(Request $request)
    {
        $itensPedido = $request->input('itens');
        $id = auth()->id();

        $codigoPedido = Str::uuid()->toString();
        foreach ($itensPedido as $item) {
            $produtoId = $item['produto_id'];
            $quantidade = $item['quantidade'];
            $pedido = Pedido::create([
                'produto_id' => $produtoId,
                'codigo_pedido' => $codigoPedido,
                'quantidade' => $quantidade,
                'user_id' => $id
            ]);
        }

        return response()->json($pedido);
    }
}
