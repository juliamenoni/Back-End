
@extends('layouts.app')

@section('title', 'Cadastrar Produto')

@section('content')

<div class="card">

    <h1>Cadastrar Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">

        @csrf

        <label>Nome do produto</label>

        <input
            type="text"
            name="nome"
            value="{{ old('nome') }}"
            required
        >

        @error('nome')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>Fabricante</label>

        <input
            type="text"
            name="fabricante"
            value="{{ old('fabricante') }}"
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
            value="{{ old('quantidade') }}"
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
            value="{{ old('preco') }}"
            required
        >

        @error('preco')
            <p class="error">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">
            Cadastrar Produto
        </button>

        <a href="{{ route('produtos.index') }}"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

@endsection
