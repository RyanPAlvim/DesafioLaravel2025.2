<x-admin-layout>
    <div class="py-4 px-4 text-white flex justify-between items-center max-w-7xl bg-sky-800 border mx-auto mt-10 rounded-lg">
        
        <h1 class="text-4xl uppercase font-semibold">Produtos</h1>
        @if(!(auth()->user()->is_admin ?? false))
            <button type="button"
                data-modal="createModal" 
                data-photopath=""
                class="hover:cursor-pointer" >
                <div class="flex gap-2 justify-center items-center transition duration-300 ease-in-out hover:scale-105 border border-white rounded-lg px-2 py-2">
                    <h1 class="hidden text-lg font-bold md:block">Criar</h1>
                    <h1 class="text-xl">+</h1>
                </div>
            </button>
        @endif
    </div>

    <div class="overflow-x-auto rounded-lg border-gray-500 border max-w-7xl mx-auto mt-6">
        <table class="w-full">
            <thead>
                <tr class="bg-sky-800 text-center font-semibold tracking-wide text-white uppercase border-b border-gray-500">
                    <th class="px-4 py-4">ID</th>
                    <th class="px-4 py-4">Nome</th>
                    <th class="px-4 py-4">Preco</th>
                    <th class="hidden md:block px-4 py-4">Vendedor</th>
                    <th class="px-4 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300 text-center">
                @foreach ($products as $product)
                    <tr class="text-gray-700 hover:bg-green-100">
                        <td class="px-4 py-4">{{ $product->id }}</td>
                        <td class="px-4 py-4">{{ $product->name }}</td>
                        <td class="px-4 py-4">R${{ str_replace(".",",",$product->price) }}</td>
                        <td class="hidden md:block px-4 py-4">{{ $product->user->name }}</td>
                        <td class="px-4 py-4 w-fit">
                            <div class="bg-green-200 inline-block rounded-lg">
                                <button type="button" 
                                    class="m-1 text-green-700 hover:text-indigo-900 font-semibold"
                                    data-modal="viewModal"
                                    data-id="{{ $product->id }}" 
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-description="{{ $product->description }}"
                                    data-stock="{{ $product->stock }}"
                                    data-photopath="{{ $product->photo_path }}"
                                    data-user="{{ $product->user->name }}"
                                    data-category="{{ $product->category_id }}"
                                    data-category_name="{{ $product->category->name }}">
                                    Ver
                                </button>
                            </div>
                            <div class="bg-blue-200 inline-block rounded-lg">
                                <button type="button"
                                    class="m-1 text-blue-700 hover:text-indigo-900 font-semibold"
                                    data-modal="editModal"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-description="{{ $product->description }}"
                                    data-stock="{{ $product->stock }}"
                                    data-photopath="{{ $product->photo_path }}"
                                    data-user="{{ $product->user->name }}"
                                    data-category="{{ $product->category_id }}">
                                    Editar
                                </button>
                            </div>
                            <div class="bg-red-200 inline-block rounded-lg">
                                <button type="button"
                                    class="m-1 text-red-600 hover:text-red-900 font-semibold"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-modal="deleteModal">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin.products.modals.create-modal')
        @include('admin.products.modals.delete-modal')
        @include('admin.products.modals.view-modal')
        @include('admin.products.modals.edit-modal')

    </div>
    
    <div class="mt-6 max-w-7xl mx-auto">
        {{ $products->links() }}
    </div>
   

</x-admin-layout>