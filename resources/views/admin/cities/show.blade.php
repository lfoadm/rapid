<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da cidade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
        </div>
        
        <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-8">
            <div class="container mx-auto">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Nome</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $city->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">UF</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $city->state }}</p>
                    </div>
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">Status</h2>
                        <p class="text-gray-700 dark:text-gray-300">{{ $city->status }}</p>
                    </div>
                    
                    <form action="{{ route('cities.destroy', $city) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <a class="py-2 px-4 bg-indigo-500 text-white rounded inline-flex items-center" href="{{ route('cities.index') }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Voltar
                        </a>
                        
                        <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded inline-flex items-center"
                        onclick="return confirm('Você tem certeza que deseja excluir esta cidade?');">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-1 12H6L5 7m5-4h4m-6 0a2 2 0 012-2h4a2 2 0 012 2H9z"></path>
                            </svg>
                            Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>