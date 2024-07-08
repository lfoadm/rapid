<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar cidade: ') }} {{ $city->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400 dark:text-gray-600">
                    <form action="{{ route('cities.update', $city->id) }}" method="POST">
                        @method('put')
                        @include('admin.cities.partials.form', [
                            'action' => route('cities.update', $city->id),
                            'method' => 'PUT',
                            'buttonText' => 'Atualizar',
                            'city' => $city,
                        ])
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>