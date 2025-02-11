<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::paginate(20);

        // return view('admin.users.index', [
        //     'users' => $users
        // ]); 

        return view('admin.users.index', compact('users'));     
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) { //Poderia usar o Request $request, mas esse StoreUserRequest é uma classe de validação
        $data = $request->only('name', 'email', 'password');

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')
                         ->with('message', 'Usuário criado com sucesso');
    }

    public function edit(string $id) {
        $user = User::where('id', $id)->first();

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id) {
        $data = $request->only('name', 'email');

        User::where('id', $id)->update($data);

        return redirect()->route('users.index')
                         ->with('message', 'Usuário atualizado com sucesso');
    }

    public function show(string $id) {
        $user = User::where('id', $id)->first();

        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id) {
        User::where('id', $id)->delete();

        return redirect()->route('users.index')
                        ->with('message', 'Usuário deletado com sucesso');
    }
}
