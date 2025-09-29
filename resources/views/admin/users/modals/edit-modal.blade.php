<div id="editModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-white rounded-2xl shadow-2xl border-4 border-yellow-500 p-8 w-full max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-yellow-600">Editar Usuário</h2>
        <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div><label class="font-semibold">Nome</label><input type="text" name="name" id="edit-name" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Email</label><input type="email" name="email" id="edit-email" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">CPF</label><input type="text" name="cpf" id="edit-cpf" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Data de Nascimento</label><input type="date" name="birth_date" id="edit-birth_date" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Telefone</label><input type="text" name="phone" id="edit-phone" class="w-full border rounded px-2 py-1"></div>
                @if(auth()->user()->is_admin ?? false)
                <div><label class="font-semibold">Admin</label>
                    <select name="is_admin" id="edit-is_admin" class="w-full border rounded px-2 py-1">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                @endif
                <div><label class="font-semibold">Rua</label><input type="text" name="rua" id="edit-rua" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Número</label><input type="text" name="numero" id="edit-numero" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Bairro</label><input type="text" name="bairro" id="edit-bairro" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Cidade</label><input type="text" name="cidade" id="edit-cidade" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Estado</label><input type="text" name="estado" id="edit-estado" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">CEP</label><input type="text" name="cep" id="edit-cep" class="w-full border rounded px-2 py-1"></div>
                <div><label class="font-semibold">Complemento</label><input type="text" name="complemento" id="edit-complemento" class="w-full border rounded px-2 py-1"></div>
            </div>
            <div class="flex justify-end gap-2 mt-8">
                <button type="submit" class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-bold hover:bg-yellow-500 transition">Salvar</button>
                <button type="button" data-close="editModal" class="px-6 py-2 rounded-lg bg-gray-400 text-white font-bold hover:bg-gray-600 transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>