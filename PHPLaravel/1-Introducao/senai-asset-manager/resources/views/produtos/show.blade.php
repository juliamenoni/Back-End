
@extends('layouts.app')

@section('title', 'Ficha do Produto')

@section('content')

<div class="card">

    <h1>Ficha do Produto</h1>

    <h3 style="color: #38bdf8;">
        Produto #{{ $produto->id }}
    </h3>

    <p style="margin-top: 20px;">
        <strong>Nome:</strong>
        {{ $produto->nome }}
    </p>

    <p style="margin-top: 15px;">
        <strong>Fabricante:</strong>
        {{ $produto->fabricante }}
    </p>

    <p style="margin-top: 15px;">
        <strong>Quantidade:</strong>
        {{ $produto->quantidade }}
    </p>

    <p style="margin-top: 15px;">
        <strong>Preço:</strong>
        R$ {{ number_format($produto->preco, 2, ',', '.') }}
    </p>

    <p style="margin-top: 15px;">
        <strong>Data de criação:</strong>
        {{ $produto->created_at->format('d/m/Y H:i') }}
    </p>

    <p style="margin-top: 15px;">
        <strong>Última atualização:</strong>
        {{ $produto->updated_at->format('d/m/Y H:i') }}
    </p>

    <div class="actions" style="margin-top: 25px;">

        <a href="{{ route('produtos.edit', $produto->id) }}"
           class="btn">
            Editar
        </a>

        <a href="{{ route('produtos.index') }}"
           class="btn btn-secondary">
            Voltar
        </a>

    </div>

</div>

@endsection
