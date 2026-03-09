<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;


class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produtos::all(); 
        return view('produtos.index', compact('produtos'));
    }
}