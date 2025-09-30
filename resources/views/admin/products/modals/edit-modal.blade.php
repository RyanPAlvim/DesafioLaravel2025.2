<div id="product-edit-modal" class="product-modal fixed z-20 inset-0 bg-black bg-opacity-50 flex sm:items-center items-start justify-center overflow-y-auto hidden">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 p-4 md:p-8 rounded-2xl shadow-2xl w-full max-w-xl mx-2 mt-8 mb-8 overflow-y-auto max-h-[90vh]">
        <h2 class="text-3xl font-extrabold text-yellow-600 mb-8 text-center tracking-wide">Editar Produto</h2>
        <form method="POST" action="" enctype="multipart/form-data" class="flex flex-col gap-5">
            @csrf
            @method("PATCH")
            <!-- Imagem do Produto -->
            <div class="flex flex-col items-center gap-2">
                <img 
                    class="imagePreview w-80 h-48 object-cover rounded-lg border-4 border-white shadow cursor-pointer hover:border-green-400 transition"
                    src="" 
                    alt="productPhoto" 
                    data-target="photopath">
                <input type="file" class="photoInput hidden" name="photo" data-target="photopath" accept="image/jpg,image/png,image/webp">
            </div>
            <!-- ID e Vendedor na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="edit-id" class="block font-semibold text-white mb-1">ID</label>
                    <input id="edit-id" type="text" readonly class="w-full p-2 rounded-lg bg-gray-700 text-white border-blue-500" data-target="id">
                </div>
                <div class="w-1/2">
                    <label for="edit-user" class="block font-semibold text-white mb-1">Vendedor</label>
                    <input id="edit-user" type="text" readonly class="w-full p-2 rounded-lg bg-gray-700 text-white border-blue-500" data-target="user">
                </div>
            </div>
            <!-- Nome e Categoria na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="edit-name" class="block font-semibold text-white mb-1">Nome</label>
                    <input id="edit-name" type="text" name="name" class="w-full p-2 rounded-lg bg-white text-gray-900 border-2 border-blue-400 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" data-target="name" required>
                </div>
                <div class="w-1/2">
                    <label for="edit-category" class="block font-semibold text-white mb-1">Categoria</label>
                    <select id="edit-category" name="category_id" class="w-full p-2 rounded-lg bg-white text-gray-800 border-2 border-blue-400 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" data-target="category">
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Preço e Estoque na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="edit-price" class="block font-semibold text-white mb-1">Preço</label>
                    <input id="edit-price" type="number" step="0.01" name="price" class="w-full p-2 rounded-lg bg-white text-green-700 border-2 border-blue-400 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition font-semibold" data-target="price" required>
                </div>
                <div class="w-1/2">
                    <label for="edit-stock" class="block font-semibold text-white mb-1">Estoque</label>
                    <input id="edit-stock" type="number" name="stock" min="0" class="w-full p-2 rounded-lg bg-white text-gray-900 border-2 border-blue-400 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" data-target="stock" required>
                </div>
            </div>
            <div>
                <label for="edit-description" class="block font-semibold text-white mb-1">Descrição</label>
                <textarea id="edit-description" name="description" class="w-full p-2 rounded-lg bg-white text-gray-900 border-2 border-blue-400 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition resize-none" rows="3" data-target="description"></textarea>
            </div>
            <!-- Botões -->
            <div class="mt-4 flex flex-col md:flex-row justify-center gap-4">
                <button type="button" data-close class="px-6 py-2 bg-gray-400 text-gray-800 rounded-lg hover:bg-gray-500 font-semibold transition">Fechar</button>
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 font-semibold transition">Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>