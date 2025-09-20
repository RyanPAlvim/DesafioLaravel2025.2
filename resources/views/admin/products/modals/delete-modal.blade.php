<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg">
        <h2 class="text-xl font-bold mb-4">Confirmar Exclusão</h2>
        <p class="mb-4">Você tem certeza que deseja excluir o item <strong id="itemName"></strong>? Esta ação não pode ser desfeita!</p>

        {{-- O formulário que realmente fará a exclusão --}}
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-4">
                <button type="button" id="cancelButton" class="text-gray-700 px-4 py-2 bg-gray-400 rounded-lg hover:bg-gray-500 font-semibold">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-900 font-semibold">Excluir</button>
            </div>
        </form>
    </div>
</div>