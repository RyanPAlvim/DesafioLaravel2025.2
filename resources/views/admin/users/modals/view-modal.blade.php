
<div id="user-view-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 rounded-2xl shadow-2xl  border-sky-800 p-8 w-full max-w-xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-cyan-400 text-center">Visualizar Usuário</h2>
        <div class="flex flex-col items-center mb-6">
            <div class="w-36 h-36 mb-4">
                <img id="view-photo" data-target="photopath" src="/images/placeholder.png" alt="Foto do usuário" class="w-full h-full object-cover rounded-lg border-4 border-sky-800 shadow-lg">
            </div>
            <div class="text-3xl font-bold text-white mb-1" id="view-name" data-target="name"></div>
            <div class="text-white text-md mb-2" id="view-email" data-target="email"></div>
        </div>
        <div class="grid grid-cols-2 gap-x-6 gap-y-3 text-gray-800 mb-4 text-md text-white">
            <div><span class="font-semibold">ID:</span> <span id="view-id" data-target="id"></span></div>
            <div><span class="font-semibold">Admin:</span> <span id="view-is_admin" data-target="is_admin"></span></div>
            <div><span class="font-semibold">CPF:</span> <span id="view-cpf" data-target="cpf"></span></div>
            <div><span class="font-semibold">Data de Nascimento:</span> <span id="view-birth_date" data-target="birth_date"></span></div>
            <div><span class="font-semibold">Telefone:</span> <span id="view-phone" data-target="phone"></span></div>
            <div><span class="font-semibold">Criado em:</span> <span id="view-created_at" data-target="created_at"></span></div>
        </div>
        <div class="bg-gray-100 rounded-lg p-4 mb-4">
            <div class="font-semibold text-sky-800 mb-2">Endereço</div>
            <div class="text-gray-700 text-sm">
                <span id="view-rua" data-target="rua"></span>, <span id="view-numero" data-target="numero"></span><br>
                <span id="view-bairro" data-target="bairro"></span> - <span id="view-cidade" data-target="cidade"></span> / <span id="view-estado" data-target="estado"></span><br>
                <span class="font-semibold">CEP:</span> <span id="view-cep" data-target="cep"></span><br>
                <span class="font-semibold">Complemento:</span> <span id="view-complemento" data-target="complemento"></span>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-8">
            <button type="button" data-close="user-view-modal" class="px-6 py-2 rounded-lg bg-blue-500 text-white font-bold hover:bg-sky-700 transition">Fechar</button>
        </div>
    </div>
</div>