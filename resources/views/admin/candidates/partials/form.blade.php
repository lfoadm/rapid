@csrf
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-700">Só administradores possuem permissões para cadastrar candidatos</p>
        <div class="mt-10 grid grid-cols-1    gap-x-6 gap-y-8 sm:grid-cols-6">
            
            <div class="sm:col-span-12">
                <label for="city_id"
                    class="block text-sm font-medium leading-6 text-gray-400">Cidade</label>
                <div class="mt-2">
                    <select id="city_id" name="city_id" autocomplete="city_id" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Selecione...</option>
                        @foreach($cities as $city)
                            {{-- <option value="{{ $city->id }}">{{ $city->name }} / {{ $city->city_id }}</option> --}}
                            <option value="{{ $city->id }}" {{ isset($candidate) && $candidate->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                      </select>                                            
                    <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                </div>
            </div>

            <div class="sm:col-span-6">
                <label for="name"
                    class="block text-sm font-medium leading-6 text-gray-400">Nome</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ $candidate->name ?? old('name') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>
            <div class="sm:col-span-6">
                <label for="surname"
                    class="block text-sm font-medium leading-6 text-gray-400">Apelido</label>
                <div class="mt-2">
                    <input type="text" name="surname" id="surname" value="{{ $candidate->surname ?? old('surname') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="number"
                    class="block text-sm font-medium leading-6 text-gray-400">Número</label>
                <div class="mt-2">
                    <input type="number" name="number" id="number" value="{{ $candidate->number ?? old('number') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="acronym"
                    class="block text-sm font-medium leading-6 text-gray-400">Partido/Sigla</label>
                <div class="mt-2">
                    <input type="text" name="acronym" id="acronym" value="{{ $candidate->acronym ?? old('acronym') }}"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('acronym')" class="mt-2" />
                </div>
            </div>
            
            <div class="sm:col-span-4">
                <label for="status"
                    class="block text-sm font-medium leading-6 text-gray-400">Situação</label>
                <div class="mt-2">
                    <select id="status" name="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" {{ (old('status', $candidate->status ?? '') === "ATIVO") ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ (old('status', $candidate->status ?? '') === "INATIVO") ? 'selected' : '' }}>Inativo</option>
                      </select>                                            
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>
            
            <!-- Image Profile -->

            <div class="col-span-full">
                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Imagem</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <input type="file" name="image" id="image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" >   
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
            </div>
        </div>
    </div>


</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <a class="text-sm font-semibold leading-6 text-gray-400" href="{{ route('candidates.index') }}">
        Cancelar
    </a>
    
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        {{ $buttonText }}
    </button>
</div>