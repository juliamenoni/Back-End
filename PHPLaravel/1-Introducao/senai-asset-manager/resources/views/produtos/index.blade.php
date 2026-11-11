
@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

<div class="card">

    <h1>Gerenciamento de Produtos</h1>

    <a href="{{ route('produtos.create') }}" class="btn">
        + Cadastrar Produto
    </a>

    <h3 style="margin-top: 30px;">
        Filtrar produtos por estoque
    </h3>

    <form action="{{ route('produtos.index') }}"
          method="GET"
          class="filter">

        <div>
            <label>Quantidade mínima</label>
            <input
                type="number"
                name="quantidade_min"
                min="0"
                value="{{ request('quantidade_min') }}"
            >
        </div>

        <div>
            <label>Quantidade máxima</label>
            <input
                type="number"
                name="quantidade_max"
                min="0"
                value="{{ request('quantidade_max') }}"
            >
        </div>

        <button type="submit">Filtrar</button>

        <a href="{{ route('produtos.index') }}"
           class="btn btn-secondary">
            Limpar
        </a>

    </form>

    <h3>Produtos cadastrados</h3>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse($produtos as $produto)

                <tr>

                    <td>{{ $produto->id }}</td>

                    <td>{{ $produto->nome }}</td>

                    <td>{{ $produto->fabricante }}</td>

                    <td>{{ $produto->quantidade }}</td>

                    <td>
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </td>

                    <td>

                        <div class="actions">

                            <a href="{{ route('produtos.show', $produto->id) }}"
                               class="btn btn-success">
                                Ficha
                            </a>

                            <a href="{{ route('produtos.edit', $produto->id) }}"
                               class="btn">
                                Editar
                            </a>

                            <form
                                action="{{ route('produtos.destroy', $produto->id) }}"
                                method="POST"
                                onsubmit="return confirm('Deseja excluir este produto?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-danger">
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        Nenhum produto cadastrado.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
