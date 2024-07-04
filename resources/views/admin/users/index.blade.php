<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <div class="flex justify-between bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Lista de usuários cadastrados!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Novo</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-400">
                                <tr>
                                    <th class="py-3 px-4 text-left">Nome</th>
                                    <th class="py-3 px-4 text-left hidden sm:table-cell">Código</th>
                                    <th class="py-3 px-4 text-left hidden sm:table-cell">Email</th>
                                    <th class="py-3 px-4 text-left hidden sm:table-cell">Cargo</th>
                                    <th class="py-3 px-4 text-left">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-300">
                                @foreach($users as $user)
                                    <tr class="border-b dark:border-gray-600">
                                        <td class="py-3 px-4">{{ $user->name }}</td>
                                        <td class="py-3 px-4 hidden sm:table-cell">{{ $user->id }}</td>
                                        <td class="py-3 px-4 hidden sm:table-cell">{{ $user->email }}</td>
                                        <td class="py-3 px-4 hidden sm:table-cell">{{ $user->role }}</td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">Editar</a>
                                            <a href="{{ route('users.show', $user->id) }}" class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>