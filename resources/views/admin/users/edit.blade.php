@extends('admin.layouts.app')

@section('title', 'Editar')

@section('content')
<h1>Editar Usuário</h1>

<!-- Componente alerta, pega do arquivo alert.blade x-(...) -->
<x-alert/>

<form action="{{ route('users.update', $user['id']) }}" method="POST">
    <!-- Precisa ter para validar o formulário -->
    @csrf 
    @method('PUT') <!-- Laravel entende que é um update -->
    <input type="text" name="name" placeholder="Nome" value="{{ $user['name'] }}">
    <input type="email" name="email" placeholder="Email" value="{{ $user['email'] }}">
    <button type="submit">Editar</button>
</form>

<a href="{{ route('users.index') }}">Voltar</a>

@endsection