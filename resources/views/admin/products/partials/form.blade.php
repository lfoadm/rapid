@csrf
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-700">Só administradores possuem permissões para cadastrar nova rifa</p>
        <div class="mt-10 grid grid-cols-1    gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-12">
                <label for="title"
                    class="block text-sm font-medium leading-6 text-gray-400">Título</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" value="{{ $product->title ?? old('title') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>
           
            <div class="sm:col-span-12">
                <label for="city_id"
                    class="block text-sm font-medium leading-6 text-gray-400">Cidade</label>
                <div class="mt-2">
                    <select id="city_id" name="city_id" autocomplete="city_id" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Selecione...</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ isset($product) && $product->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                      </select>                                            
                    <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                </div>
            </div>
            <div class="sm:col-span-4">
                <label for="status"
                    class="block text-sm font-medium leading-6 text-gray-400">Situação</label>
                <div class="mt-2">
                    <select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" {{ (old('status', $product->status ?? '') === "ATIVO") ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ (old('status', $product->status ?? '') === "INATIVO") ? 'selected' : '' }}>Inativo</option>
                      </select>                                            
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>
        </div>
    </div>

</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <a class="text-sm font-semibold leading-6 text-gray-400" href="{{ route('products.index') }}">
        Cancelar
    </a>
    
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        {{ $buttonText }}
    </button>
</div>