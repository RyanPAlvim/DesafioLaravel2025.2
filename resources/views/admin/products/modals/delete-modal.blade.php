<div id="deleteModal" class="fixed z-20 inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 p-6 rounded-lg shadow-lg max-w-lg">
        <h2 class="text-xl font-bold mb-4 text-white">Confirmar Exclusão</h2>
        <p class="mb-4 text-white">Você tem certeza que deseja excluir o item <strong data-target="name" ></strong>? Esta ação não pode ser desfeita!</p>

        {{-- O formulário que realmente fará a exclusão --}}
        <form method="POST" action="">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-4">
                <button type="button" class="text-gray-800 px-4 py-2 bg-gray-400 rounded-lg hover:bg-gray-500 font-semibold" data-close>Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-900 font-semibold">Excluir</button>
            </div>
        </form>
    </div>
</div>