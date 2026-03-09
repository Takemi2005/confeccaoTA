<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedores;

class FornecedoresController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedores::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'        => 'required|string|max:255',
            'cnpj'        => 'required|string|unique:fornecedores',
            'email'       => 'nullable|email',
            'telefone'    => 'nullable|string',
            'endereco'    => 'nullable|string',
            'cidade'      => 'nullable|string',
            'estado'      => 'nullable|string|max:2',
            'cep'         => 'nullable|string|max:9',
            'observacoes' => 'nullable|string',
        ]);

        Fornecedores::create($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function edit(Fornecedores $fornecedore)
    {
        return view('fornecedores.edit', compact('fornecedore'));
    }

    public function update(Request $request, Fornecedores $fornecedore)
    {
        $request->validate([
            'nome'        => 'required|string|max:255',
            'cnpj'        => 'required|string|unique:fornecedores,cnpj,' . $fornecedore->id,
            'email'       => 'nullable|email',
            'telefone'    => 'nullable|string',
            'endereco'    => 'nullable|string',
            'cidade'      => 'nullable|string',
            'estado'      => 'nullable|string|max:2',
            'cep'         => 'nullable|string|max:9',
            'observacoes' => 'nullable|string',
        ]);

        $fornecedore->update($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedores $fornecedore)
    {
        $fornecedore->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor removido com sucesso!');
    }
}