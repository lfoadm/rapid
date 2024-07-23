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
                    <form action="{{ route('ticket.store') }}" method="POST" id="ticket-form">
                        @csrf

                        @include('admin.tickets.partials.multiselect', [
                            'method' => 'POST',
                            'buttonText' => 'Criar',
                            'product' => new App\Models\Admin\Product,
                            // 'items' => $candidates
                        ])
                       

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('add-attribute').addEventListener('click', function() {
            const container = document.getElementById('attributes-container');
            const div = document.createElement('div');
            div.classList.add('flex', 'items-center', 'space-x-2', 'mt-2');
            div.innerHTML = `
                <input type="text" name="attributes[]" class="block mt-1 w-full" placeholder="Attribute" />
                <input type="text" name="values[]" class="block mt-1 w-full" placeholder="Value" />
                <button type="button" class="remove-attribute px-4 py-2 bg-red-500 text-white rounded-md">Remove</button>
            `;
            container.appendChild(div);
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-attribute')) {
                event.target.parentElement.remove();
            }
        });
    </script>
        
    
</x-app-layout>