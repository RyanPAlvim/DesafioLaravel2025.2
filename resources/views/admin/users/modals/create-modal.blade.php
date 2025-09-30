<div id="user-create-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-60">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 rounded-2xl shadow-2xl border-sky-800 p-8 w-full max-w-lg mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-green-600">Criar Usuário</h2>
        <form id="createUserForm" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center mb-6">
                <div class="w-36 h-36 mb-2">
                    <img class="imagePreview w-full h-full object-cover rounded-lg border-4 border-sky-800 shadow cursor-pointer hover:border-green-400 transition" src="/images/placeholder.png" alt="Foto do usuário" data-target="profile_photo_path">
                    <input type="file" class="photoInput hidden" name="profile_photo_path" data-target="profile_photo_path" accept="image/jpg,image/png,image/webp">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 text-gray-800">
                <div><label class="font-semibold text-white">Nome</label><input type="text" name="name" data-target="name" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Senha</label><input type="password" name="password" data-target="password" class="w-full border border-sky-500 rounded-lg px-2 py-1" required></div>
                <div><label class="font-semibold text-white">Email</label><input type="email" name="email" data-target="email" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">CPF</label><input type="text" name="cpf" data-target="cpf" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Data de Nascimento</label><input type="date" name="birth_date" data-target="birth_date" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Telefone</label><input type="text" name="phone" data-target="phone" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                @if(auth()->user()->is_admin ?? false)
                <div><label class="font-semibold text-white mt-4">Admin</label>
                    <select name="is_admin" data-target="is_admin" class="w-full border rounded-lg px-2 py-1">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                @endif
                <div><label class="font-semibold text-white">CEP (Completa dados)</label><input type="text" name="cep" data-target="cep" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Rua</label><input type="text" name="rua" data-target="rua" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Número</label><input type="text" name="numero" data-target="numero" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Bairro</label><input type="text" name="bairro" data-target="bairro" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Cidade</label><input type="text" name="cidade" data-target="cidade" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Estado</label><input type="text" name="estado" data-target="estado" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
                <div><label class="font-semibold text-white">Complemento</label><input type="text" name="complemento" data-target="complemento" class="w-full border border-sky-500 rounded-lg px-2 py-1"></div>
            </div>
            <div class="flex justify-end gap-2 mt-8">
                <button type="submit" class="px-6 py-2 rounded-lg bg-green-600 text-white font-bold hover:bg-yellow-500 transition">Criar</button>
                <button type="button" data-close="user-create-modal" class="px-6 py-2 rounded-lg bg-gray-400 text-white font-bold hover:bg-gray-600 transition">Cancelar</button>
            </div>
        </form>
    </div>
</div>