<x-admin-layout>
    <div class="py-4 px-4 text-white flex justify-between items-center max-w-7xl bg-sky-800 border mx-auto mt-6 rounded-lg">
        <div>
            
        </div>
        <h1 class="text-4xl uppercase font-semibold">Produtos</h1>
        <a href="{{route('admin.products.create')}}">
            <div class="flex gap-2 justify-center items-center transition duration-300 ease-in-out hover:scale-105 border border-white rounded-lg px-2 py-2">
                <h1 class="text-lg font-bold">Criar</h1>
                <h1 class="text-xl">+</h1>
            </div>
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg border-gray-500 border max-w-7xl mx-auto mt-6">
        <table class="w-full">
            <thead>
                <tr class="bg-sky-800 text-center font-semibold tracking-wide text-white uppercase border-b border-gray-500">
                    <th class="px-4 py-4">ID</th>
                    <th class="px-4 py-4">Nome</th>
                    <th class="px-4 py-4">Preco</th>
                    <th class="px-4 py-4">Vendedor</th>
                    <th class="px-4 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300 text-center">
                @foreach ($products as $product)
                    <tr class="text-gray-700 hover:bg-green-100">
                        <td class="px-4 py-4">{{ $product->id }}</td>
                        <td class="px-4 py-4">{{ $product->name }}</td>
                        <td class="px-4 py-4">R${{ str_replace(".",",",$product->price) }}</td>
                        <td class="px-4 py-4">{{ $product->user_id}}</td>
                        <td class="px-4 py-4 w-fit">
                            <button type="button" 
                                class="m-1 text-green-700 hover:text-indigo-900 open-view-modal font-semibold"
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                                data-stock="{{ $product->stock }}"
                                data-user="{{ $product->user_id }}">
                                Ver
                            </button>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-700 hover:text-indigo-900 m-1 font-semibold">Editar</a>
                            <button type="button" 
                                class="m-1 text-red-600 hover:text-red-900 open-delete-modal font-semibold"
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->name }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin.products.modals.delete-modal')
        @include('admin.products.modals.view-modal')

    </div>
    
    <div class="mt-6 max-w-7xl mx-auto">
        {{ $products->links() }}
    </div>
   

</x-admin-layout>