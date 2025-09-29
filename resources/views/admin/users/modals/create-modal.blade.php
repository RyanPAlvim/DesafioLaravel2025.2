<div id="createModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white rounded-2xl shadow-2xl border-4 border-green-600 p-8 w-full max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-green-700">Criar Usuário</h2>
        <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div><label class="font-semibold">Nome</label><input type="text" name="name" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Email</label><input type="email" name="email" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">CPF</label><input type="text" name="cpf" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Data de Nascimento</label><input type="date" name="birth_date" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Telefone</label><input type="text" name="phone" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Admin</label><select name="is_admin" class="w-full border rounded px-2 py-1"><option value="0">Não</option><option value="1">Sim</option></select></div>
                <div><label class="font-semibold">Rua</label><input type="text" name="rua" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Número</label><input type="text" name="numero" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Bairro</label><input type="text" name="bairro" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Cidade</label><input type="text" name="cidade" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Estado</label><input type="text" name="estado" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">CEP</label><input type="text" name="cep" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Complemento</label><input type="text" name="complemento" class="w-full border rounded px-2 py-1"></div>
            </div>
            <div class="flex justify-end gap-2 mt-8">
                <button type="submit" class="px-6 py-2 rounded-lg bg-green-600 text-white font-bold hover:bg-green-500 transition">Criar</button>
                <button type="button" data-close="createModal" class="px-6 py-2 rounded-lg bg-gray-400 text-white font-bold hover:bg-gray-600 transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>