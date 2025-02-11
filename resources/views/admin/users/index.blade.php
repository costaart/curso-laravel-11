@extends('admin.layouts.app')

@section('title', 'Usuários')

@section('content')

    <h1>Usuários</h1>

        <a href="{{ route('users.create') }}">Cadastrar</a>

        <x-alert/>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                            <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhum usuário cadastrado</td>                    
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
@endsection