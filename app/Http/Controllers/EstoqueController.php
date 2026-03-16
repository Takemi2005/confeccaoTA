<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function index()
{
    $estoques = Estoque::paginate(10);
    return view('estoque.index', compact('estoques')); // ← corrigido
}



    public function create()
    {
        return view('estoque.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'descricao'      => 'nullable|string',
            'quantidade'     => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
        ]);

        Estoque::create($request->all());

        return redirect()->route('estoque.index')->with('success', 'Item cadastrado com sucesso!');
    }

    public function edit(Estoque $estoque)
    {
        return view('estoque.edit', compact('estoque'));
    }

    public function update(Request $request, Estoque $estoque)
    {
        $request->validate([
            'nome'           => 'required|string|max:255',
            'descricao'      => 'nullable|string',
            'quantidade'     => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0',
        ]);

        $estoque->update($request->all());

        return redirect()->route('estoque.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(Estoque $estoque)
    {
        $estoque->delete();
        return redirect()->route('estoque.index')->with('success', 'Item removido com sucesso!');
    }
}