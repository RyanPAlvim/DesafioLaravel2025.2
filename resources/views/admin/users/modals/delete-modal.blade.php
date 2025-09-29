<div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white rounded-2xl shadow-2xl border-4 border-red-600 p-8 w-full max-w-md mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-red-600">Excluir Usuário</h2>
        <p class="mb-6 text-gray-800">Tem certeza que deseja excluir o usuário <span id="delete-name" class="font-bold"></span>?</p>
        <form id="deleteUserForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2 mt-8">
                <button type="submit" class="px-6 py-2 rounded-lg bg-red-600 text-white font-bold hover:bg-red-500 transition">Excluir</button>
                <button type="button" data-close="deleteModal" class="px-6 py-2 rounded-lg bg-gray-400 text-white font-bold hover:bg-gray-600 transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>