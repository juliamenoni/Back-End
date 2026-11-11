<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProdutoController extends Controller
{
    // Listar produtos e filtrar estoque
    public function index(Request $request): View
    {
        $filtros = $request->validate([
            'quantidade_min' => 'nullable|integer|min:0',
            'quantidade_max' => 'nullable|integer|min:0',
        ]);

        $query = Produto::query();

        if (isset($filtros['quantidade_min'])) {
            $query->where(
                'quantidade',
                '>=',
                $filtros['quantidade_min']
            );
        }

        if (isset($filtros['quantidade_max'])) {
            $query->where(
                'quantidade',
                '<=',
                $filtros['quantidade_max']
            );
        }

        $produtos = $query->orderBy('id')->get();

        return view('produtos.index', compact('produtos'));
    }

    // Abrir formulário de cadastro
    public function create(): View
    {
        return view('produtos.create');
    }

    // Cadastrar produto
    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'fabricante' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|gt:0',
        ]);

        Produto::create($dados);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    // Visualizar ficha
    public function show(Produto $produto): View
    {
        return view('produtos.show', compact('produto'));
    }

    // Abrir edição
    public function edit(Produto $produto): View
    {
        return view('produtos.edit', compact('produto'));
    }

    // Atualizar produto
    public function update(
        Request $request,
        Produto $produto
    ): RedirectResponse {

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'fabricante' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|gt:0',
        ]);

        $produto->update($dados);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    // Excluir produto
    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
