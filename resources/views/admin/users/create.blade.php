@extends('admin.layouts.app')

@section('title', 'Cadastrar')

@section('content')

    <div class="py-6">
        <h2 class="font-semibold text-x text-gray-800">Novo Usuário</h2>

    </div>

<!-- Componente alerta, pega do arquivo alert.blade x-(...) -->
<x-alert/>

<form action="{{ route('users.store') }}" method="POST">
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Senha">

    <button type="submit">Cadastrar</button>
    @csrf 
    <!-- Precisa ter para validar o formulário -->
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection