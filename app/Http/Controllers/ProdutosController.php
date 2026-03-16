<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco'     => 'required|numeric|min:0',
        ]);

        Produtos::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produtos $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produtos $produto)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco'     => 'required|numeric|min:0',
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produtos $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto removido com sucesso!');
    }
}