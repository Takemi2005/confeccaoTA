<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;


class ClientesController extends Controller
{
   public function index()
   {
      $clientes = Clientes::all(); // Busca todos os clientes
      return view('clientes.index', compact('clientes'));
   }

   // Exibe o formulário cadastro (a janela/pag de inserção)
   public function create()
   {
      return view('clientes.create');
   }

   // recebe os dados do formulário e salva no banco de dados
   public function store(Request $request)
   {
      // Validação dos dados recebidos do formulário
      $request->validate([
         'nome' => 'required|string|max:255',
         'cpf' => 'required|string|unique:clientes',
         'email' => 'required|email|unique:clientes',
         'telefone' => 'required|string',
         'endereco' => 'nullable|string',
      ]);

      // 2. salva o nome cliente
      Clientes::create($request->all());

      // 3. redireciona para a página de listagem de clientes com uma mensagem de sucesso
      return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
   }




   // Abre a tela de edição do cliente
   public function edit(clientes $cliente)
   {
      return view('clientes.edit', compact('cliente'));
   }

   // salva as alterações feitas no cliente
   public function update(Request $request, clientes $cliente)
   {
   }
}