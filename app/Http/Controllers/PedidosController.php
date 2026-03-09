<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedidos::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_pedido' => 'required|string|unique:pedidos',
            'data_pedido'   => 'required|date',
            'valor_total'   => 'required|numeric|min:0',
            'status'        => 'required|string',
            'observacoes'   => 'nullable|string',
        ]);

        Pedidos::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido cadastrado com sucesso!');
    }

    public function edit(Pedidos $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedidos $pedido)
    {
        $request->validate([
            'numero_pedido' => 'required|string|unique:pedidos,numero_pedido,' . $pedido->id,
            'data_pedido'   => 'required|date',
            'valor_total'   => 'required|numeric|min:0',
            'status'        => 'required|string',
            'observacoes'   => 'nullable|string',
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido removido com sucesso!');
    }
}