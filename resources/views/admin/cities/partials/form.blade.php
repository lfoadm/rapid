@csrf
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-700">Só administradores possuem permissõespara cadastrar nova cidade</p>

        <div class="mt-10 grid grid-cols-1    gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-12">
                <label for="name"
                    class="block text-sm font-medium leading-6 text-gray-400">Nome</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ $city->name ?? old('name') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
           
            <div class="sm:col-span-12">
                <label for="state"
                    class="block text-sm font-medium leading-6 text-gray-400">Estado</label>
                <div class="mt-2">
                    <select id="state" name="state" autocomplete="state" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Selecione...</option>
                        <option value="MG" {{ (old('state', $city->state ?? '') == 'MG') ? 'selected' : '' }}>Minas Gerais</option>
                        <option value="SP" {{ (old('state', $city->state ?? '') == 'SP') ? 'selected' : '' }}>São Paulo</option>
                        <option value="MS" {{ (old('state', $city->state ?? '') == 'MS') ? 'selected' : '' }}>Matogrosso do Sul</option>
                        <option value="GO" {{ (old('state', $city->state ?? '') == 'GO') ? 'selected' : '' }}>Goiás</option>                        
                      </select>                                            
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>
            </div>
        </div>
    </div>

</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <a class="text-sm font-semibold leading-6 text-gray-400" href="{{ route('cities.index') }}">
        Cancelar
    </a>
    
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        {{ $buttonText }}
    </button>
</div>