<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $product->name }} | {{ config('app.name') }}</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>
<body style="background-image: url('{{ asset('images/fundo.png') }}')" class=" min-h-screen flex flex-col">
	<header class="w-full">
		@include('components.home-nav')
	</header>
	<main class="flex-1 w-full flex flex-col items-center justify-center">
	<div class="w-full max-w-7xl pb-24 pt-24 mx-auto mt-24 mb-24 bg-sky-950 rounded-xl shadow-lg p-12 flex flex-col lg:flex-row items-center gap-12">
			<!-- Foto do produto -->
			<div class="flex-shrink-0 w-full lg:w-1/2 flex justify-center items-center">
				<img class="w-100 h-52 sm:h-80 object-cover rounded-lg shadow" src="{{ $product->photo_path ? asset('storage/images/' . $product->photo_path) : asset('images/placeholder.png') }}" alt="{{ $product->name }}">
			</div>
			<!-- Informações do produto -->
			<div class="w-full lg:w-1/2 flex flex-col justify-center items-start">
				<h1 class="text-3xl font-bold text-white mb-4">{{ $product->name }}</h1>
				<span class="text-green-400 font-bold text-3xl mb-8">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
				<p class="text-gray-300 mb-4">{{ $product->description }}</p>
				<span class="text-xs text-gray-400 mb-4">Estoque: {{ $product->stock }}</span>
				<span class="text-sm text-gray-300 mb-4">Vendedor: <span class="font-semibold text-white">{{ $product->user->name ?? 'Desconhecido' }}</span></span>
				<div class="flex gap-4 mt-8">
					{{-- <a href="{{ route('home') }}">
						<x-primary-button type="button" class="bg-blue-800 hover:bg-blue-700">
							Voltar
						</x-primary-button>
					</a> --}}
					<x-primary-button type="button" class="px-10 py-4 text-3xl bg-green-600 hover:bg-green-500">
						Comprar Agora
					</x-primary-button>
				</div>
			</div>
		</div>
	</main>
	<footer>
		@include('components.home-footer')
	</footer>
</body>
</html>
