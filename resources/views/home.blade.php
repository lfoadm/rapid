<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <div class="p-2 sm:p-10 lg:flex-auto bg-slate-100">
            @if (Route::has('login'))
            <nav class="mx-3 flex flex-1 justify-center">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-900 dark:hover:text-gray-900/80 dark:focus-visible:ring-gray-900">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-900 dark:hover:text-gray-900/80 dark:focus-visible:ring-gray-900">
                    Entrar
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-gray-900 dark:hover:text-gray-900/80 dark:focus-visible:ring-gray-900">
                    Registrar
                </a>
                @endif
                @endauth
            </nav>
            @endif
        </div>

        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl sm:text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Aposte! <strong
                            class="text-blue-600">R$10,00</strong></h2>
                    {{-- <p class="mt-6 text-lg leading-8 text-gray-600">Distinctio et nulla eum soluta et neque labore
                        quibusdam. Saepe et quasi iusto modi velit ut non voluptas in. Explicabo id ut laborum.</p> --}}
                </div>
                <div
                    class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                    <div class="p-8 sm:p-10 lg:flex-auto">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900">ITURAMA</h3>
                        <p class="mt-6 text-base leading-7 text-gray-600">Escolha 13 vereadores e torça!</p>
                        <div class="mt-10 flex items-center gap-x-4">
                            <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">Regras</h4>
                            <div class="h-px flex-auto bg-gray-100"></div>
                        </div>
                        <ul role="list"
                            class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                O prêmio final da aposta será apurado pelo total de apostadores da rifa
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Aposta com preço único R$ 10,00
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Em caso de empate, o prêmio será dividido em partes iguais
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                Você pode apostar quantas vezes quiser
                            </li>
                        </ul>
                    </div>
                    <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                        <div
                            class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                            <div class="mx-auto max-w-xs px-8">
                                <p class="text-base font-semibold text-gray-600">Valor atual do prêmio</p>
                                <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                    <span class="text-5xl font-bold tracking-tight text-gray-900">R$ 850,00</span>
                                    <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600"></span>
                                </p>
                                <a href="{{ route('tickets.index') }}" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Comprar
                                </a>
                                <p class="mt-6 text-xs leading-5 text-gray-600">Para comprar, é necessário realizar o login ou registrar-se!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>