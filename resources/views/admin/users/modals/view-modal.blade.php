<div id="viewModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white rounded-2xl shadow-2xl border-4 border-sky-800 p-8 w-full max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-sky-800">Visualizar Usuário</h2>
        <div class="space-y-2 text-gray-800">
            <div><span class="font-semibold">ID:</span> <span id="view-id"></span></div>
            <div><span class="font-semibold">Nome:</span> <span id="view-name"></span></div>
            <div><span class="font-semibold">Email:</span> <span id="view-email"></span></div>
            <div><span class="font-semibold">CPF:</span> <span id="view-cpf"></span></div>
            <div><span class="font-semibold">Data de Nascimento:</span> <span id="view-birth_date"></span></div>
            <div><span class="font-semibold">Telefone:</span> <span id="view-phone"></span></div>
            <div><span class="font-semibold">Admin:</span> <span id="view-is_admin"></span></div>
            <div><span class="font-semibold">Endereço:</span> <span id="view-rua"></span>, <span id="view-numero"></span>, <span id="view-bairro"></span>, <span id="view-cidade"></span> - <span id="view-estado"></span></div>
            <div><span class="font-semibold">CEP:</span> <span id="view-cep"></span></div>
            <div><span class="font-semibold">Complemento:</span> <span id="view-complemento"></span></div>
            <div><span class="font-semibold">Criado em:</span> <span id="view-created_at"></span></div>
        </div>
        <div class="flex justify-end gap-2 mt-8">
            <button type="button" data-close="viewModal" class="px-6 py-2 rounded-lg bg-sky-800 text-white font-bold hover:bg-sky-700 transition">Fechar</button>
        </div>
    </div>
</div>