<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(3);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect(route('users.index'))->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        };
        
        return view('admin.users.edit', compact('user'));
    }

    public function update(string $id, UpdateUserRequest $request)
    {
        if(!$user = User::find($id)) {
            return back()->with('message', 'Usuário não encontrado');
        };

        $user->update($request->only([
            'name', 'email', 'role'
        ]));

        return redirect(route('users.index'))->with('success', 'Usuário editado com sucesso!');


    }
}
