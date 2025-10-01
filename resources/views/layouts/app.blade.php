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
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @if (request()->routeIs('profile.edit'))
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cepInput = document.querySelector('#cep');
            if (cepInput && !cepInput.dataset.cepListenerAdded) {
                cepInput.dataset.cepListenerAdded = 'true';
                let errorMsg = document.getElementById('cep-error-msg');
                if (!errorMsg) {
                    errorMsg = document.createElement('div');
                    errorMsg.id = 'cep-error-msg';
                    errorMsg.textContent = 'CEP não encontrado.';
                    errorMsg.style.display = 'none';
                    errorMsg.style.color = '#e53e3e';
                    errorMsg.style.fontWeight = 'bold';
                    errorMsg.style.textAlign = 'center';
                    errorMsg.style.margin = '10px auto';
                    cepInput.parentElement.parentElement.prepend(errorMsg);
                }
                cepInput.addEventListener('input', async function () {
                    const cep = cepInput.value.replace(/\D/g, '');
                    if (cep.length === 8) {
                        try {
                            const res = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                            const data = await res.json();
                            if (!data.erro) {
                                errorMsg.style.display = 'none';
                                const rua = document.querySelector('#rua');
                                const bairro = document.querySelector('#bairro');
                                const cidade = document.querySelector('#cidade');
                                const estado = document.querySelector('#estado');
                                if (rua) rua.value = data.logradouro || '';
                                if (bairro) bairro.value = data.bairro || '';
                                if (cidade) cidade.value = data.localidade || '';
                                if (estado) estado.value = data.uf || '';
                            } else {
                                errorMsg.style.display = 'block';
                            }
                        } catch (e) {
                            errorMsg.style.display = 'block';
                        }
                    } else {
                        errorMsg.style.display = 'none';
                    }
                });
            }
        });
        </script>
        @endif
    </body>
</html>
