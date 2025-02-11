@extends('admin.layouts.app')

@section('title', 'Detalhes')

@section('content')
<h1>Detalhes do Usuário</h1>

<p>Id: {{$user->id}}</p>
<p>Nome: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Atualizado em: {{$user->updated_at}}</p>

<a href="{{ route('users.index') }}">Voltar</a>
@endsection
