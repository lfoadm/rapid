<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de cidades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <div class="flex justify-between bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('cities.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Adicionar nova cidade</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">
                        @if ($cities->isEmpty())
                            <h4 class="text-center py-4">Não há itens cadastrados...</h4>
                        @else
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-400">
                                <tr>
                                    <th class="py-3 px-4 text-center">Nome</th>
                                    <th class="py-3 px-4 hidden sm:table-cell text-center">Estado</th>
                                    <th class="py-3 px-4 hidden sm:table-cell text-center">Status</th>
                                    <th class="py-3 px-4  text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 dark:text-gray-300">
                                @foreach($cities as $city)
                                    <tr class="border-b dark:border-gray-600">
                                        <td class="py-3 px-4 text-center">{{ $city->name }}</td>
                                        <td class="py-3 px-4 hidden sm:table-cell text-center">{{ $city->state }}</td>
                                        <td class="py-3 px-4 hidden sm:table-cell text-center">
                                            @if ($city->status == 'ATIVO')
                                                <span class="inline-flex items-center rounded-md bg-green-500 px-2 py-1 text-xs font-medium text-green-900 ring-1 ring-inset ring-green-600/20">
                                                    {{ $city->status }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center rounded-md bg-red-500 px-2 py-1 text-xs font-medium text-red-900 ring-1 ring-inset ring-red-600/20">
                                                    {{ $city->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <a href="{{ route('cities.edit', $city->id) }}" class="inline-flex items-center rounded-md bg-sky-500 px-2 py-1 text-xs font-medium text-sky-50 ring-1 ring-inset ring-sky-700/10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('cities.show', $city->id) }}" class="inline-flex items-center rounded-md bg-teal-500 px-2 py-1 text-xs font-medium text-indigo-50 ring-1 ring-inset ring-indigo-700/10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                    <div class="mt-8">
                        {{ $cities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>