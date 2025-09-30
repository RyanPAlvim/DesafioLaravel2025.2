<div id="user-delete-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 rounded-2xl shadow-2xl border-sky-800 p-8 w-full max-w-md mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-rose-400">Excluir Usuário</h2>
        @if(auth()->user()->is_admin ?? false)
            <p class="mb-6 text-white">Tem certeza que deseja excluir o usuário <span id="delete-name" data-target="name" class="font-bold"></span>?</p>
        @else
            <p class="mb-6 text-white text-lg">Tem certeza que deseja excluir sua conta ?</p>
        @endif
        <form id="deleteUserForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2 mt-8">
                <button type="button" data-close="user-delete-modal" class="px-6 py-2 rounded-lg bg-gray-400 text-gray-800 font-bold hover:bg-gray-600 transition">Cancelar</button>
                <button type="submit" class="px-6 py-2 rounded-lg bg-red-500 text-white font-bold hover:bg-red-600 transition">Excluir</button>
            </div>
        </form>
    </div>
</div>