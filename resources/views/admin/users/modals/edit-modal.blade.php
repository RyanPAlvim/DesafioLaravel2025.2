<div id="user-edit-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 rounded-2xl shadow-2xl border-sky-800 p-8 w-full max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-yellow-600">Editar Usuário</h2>
        <form id="editUserForm" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center mb-6">
                <div class="w-36 h-36 mb-2">
                    <img class="imagePreview w-full h-full object-cover rounded-lg border-4 border-sky-800 shadow cursor-pointer hover:border-green-400 transition" src="" alt="Foto do usuário" data-target="photopath">
                    <input type="file" class="photoInput hidden" name="profile_photo_path" data-target="profile_photo_path" accept="image/jpg,image/png,image/webp">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 text-gray-800">
                <div><label class="font-semibold text-white">Nome</label><input type="text" name="name" id="edit-name" data-target="name" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Email</label><input type="email" name="email" id="edit-email" data-target="email" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">CPF</label><input type="text" name="cpf" id="edit-cpf" data-target="cpf" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Data de Nascimento</label><input type="date" name="birth_date" id="edit-birth_date" data-target="birth_date" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Telefone</label><input type="text" name="phone" id="edit-phone" data-target="phone" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                @if(auth()->user()->is_admin ?? false)
                <div><label class="font-semibold text-white mt-4">Admin</label>
                    <select name="is_admin" id="edit-is_admin" data-target="is_admin" class="w-full border rounded-lg px-2 py-1">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                @endif
                <div><label class="font-semibold text-white">CEP (Completa dados)</label><input type="text" name="cep" id="edit-cep" data-target="cep" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Rua</label><input type="text" name="rua" id="edit-rua" data-target="rua" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Número</label><input type="text" name="numero" id="edit-numero" data-target="numero" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Bairro</label><input type="text" name="bairro" id="edit-bairro" data-target="bairro" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Cidade</label><input type="text" name="cidade" id="edit-cidade" data-target="cidade" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Estado</label><input type="text" name="estado" id="edit-estado" data-target="estado" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Complemento</label><input type="text" name="complemento" id="edit-complemento" data-target="complemento" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
            </div>
            <div class="flex justify-end gap-2 mt-8">
                <button type="submit" class="px-6 py-2 rounded-lg bg-green-600 text-white font-bold hover:bg-yellow-500 transition">Salvar</button>
                <button type="button" data-close="user-edit-modal" class="px-6 py-2 rounded-lg bg-gray-400 text-white font-bold hover:bg-gray-600 transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>