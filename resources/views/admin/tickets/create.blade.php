<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apostando...') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400 dark:text-gray-600">
                    <form action="{{ route('tickets.store') }}" method="POST" id="ticket-form">
                        @csrf

                        <div class="mb-4">
                            <label for="city_id" class="block text-gray-700">Cidade:</label>
                            <select name="city_id" id="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Selecione...</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                
                        <div class="mb-4">
                            <label for="candidates" class="block text-gray-700">Candidatos:</label>
                            <select name="candidates[]" id="candidates" multiple class="mt-2 w-full border-gray-300 rounded-md shadow-sm h-48">
                                <!-- Candidates will be loaded via AJAX -->
                            </select>
                        </div>
                
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    document.getElementById('city_id').addEventListener('change', function () {
        const cityId = this.value;
        const candidatesSelect = document.getElementById('candidates');
        candidatesSelect.innerHTML = '';

        if (cityId) {
            fetch(`/cities/${cityId}/candidates`)
                .then(response => response.json())
                .then(candidates => {
                    candidates.forEach(candidate => {
                        const option = document.createElement('option');
                        option.value = candidate.id;
                        option.text = `${candidate.number} - ${candidate.surname} / ${candidate.acronym}`;
                        candidatesSelect.add(option);
                    });
                });
        }
    });
    </script>
</x-app-layout>