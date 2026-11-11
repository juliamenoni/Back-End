
@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')

<div class="card">

    <h1>Editar Produto #{{ $produto->id }}</h1>

    <form
        action="{{ route('produtos.update', $produto->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <label>Nome do produto</label>

        <input
            type="text"
            name="nome"
            value="{{ old('nome', $produto->nome) }}"
            required
        >

        @error('nome')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Fabricante</label>

        <input
            type="text"
            name="fabricante"
            value="{{ old('fabricante', $produto->fabricante) }}"
            required
        >

        @error('fabricante')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Quantidade em estoque</label>

        <input
            type="number"
            name="quantidade"
            min="0"
            value="{{ old('quantidade', $produto->quantidade) }}"
            required
        >

        @error('quantidade')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Preço</label>

        <input
            type="number"
            name="preco"
            min="0.01"
            step="0.01"
            value="{{ old('preco', $produto->preco) }}"
            required
        >

        @error('preco')
            <p class="error">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">
            Salvar Alterações
        </button>

        <a href="{{ route('produtos.index') }}"
           class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

@endsection
