@csrf
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-700">Só administradores possuem permissões
            para cadastrar novo usuário</p>

        <div class="mt-10 grid grid-cols-1    gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-12">
                <label for="name"
                    class="block text-sm font-medium leading-6 text-gray-400">Nome</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            <div class="sm:col-span-12">
                <label for="email"
                    class="block text-sm font-medium leading-6 text-gray-400">E-mail</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="{{ $user->email ?? old('email') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="sm:col-span-12">
                <label for="role"
                    class="block text-sm font-medium leading-6 text-gray-400">Função</label>
                <div class="mt-2">
                    <select id="role" name="role" autocomplete="role" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        
                        <option value="user" {{ (old('role', $user->role ?? '') == 'user') ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                        
                      </select>                                            
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
            </div>

            @if ($method == 'POST')
                <div class="sm:col-span-12">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-400">Senha</label>
                    <div class="mt-2">
                        <input type="password" required name="password" id="password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
            @endif
                
        </div>
    </div>

</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <a class="text-sm font-semibold leading-6 text-gray-400" href="{{ route('users.index') }}">
        Cancelar
    </a>
    
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        {{ $buttonText }}
    </button>
</div>