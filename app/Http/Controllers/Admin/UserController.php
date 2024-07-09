<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $per_page = 10;
    public function index()
    {
        $users = User::orderBy('id', 'desc')->simplePaginate($this->per_page);
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
        $roles = ['user', 'admin'];
        // dd($roles);

        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        };
        
        return view('admin.users.edit', compact('user', 'roles'));
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

    public function show(string $id)
    {
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        };
        
        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id)
    {
        
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado');
        };

        if(Auth::user()->id === $user->id) {
            return back()->with('message', 'Você não pode apagar seu próprio usuário');
        }

        $user->delete();
        return redirect()->route('users.index')->with('message', 'Usuário apagado com sucesso');
    }
}
