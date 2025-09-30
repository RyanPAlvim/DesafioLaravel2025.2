<div id="product-view-modal" class="product-modal fixed z-20 inset-0 bg-black bg-opacity-50 flex sm:items-center items-start justify-center overflow-y-auto hidden">
    <div class="bg-gradient-to-t from-teal-800 to-sky-900 p-4 md:p-8 rounded-2xl shadow-2xl w-full max-w-xl mx-2 mt-8 mb-8 overflow-y-auto max-h-[90vh]">
        <h2 class="text-3xl font-extrabold text-cyan-400 mb-8 text-center tracking-wide">Visualizar Produto</h2>
        <form method="POST" action="" enctype="multipart/form-data" class="flex flex-col gap-5">
            @csrf
            @method("PATCH")
            <!-- Imagem do Produto -->
            <div class="flex flex-col items-center gap-2">
                <img 
                    class="w-80 h-48 object-cover rounded-lg border-4 border-white shadow"
                    src="" 
                    alt="productPhoto" 
                    data-target="photopath">
                <input type="file" readonly class="photoInput hidden" name="photo" data-target="photopath" accept="image/jpg,image/png,image/webp">
            </div>
            <!-- ID e Vendedor na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="view-id" class="block font-semibold text-white mb-1">ID</label>
                    <input id="view-id" type="text" readonly class="w-full p-2 rounded-lg bg-gray-700 text-white border-blue-500" data-target="id">
                </div>
                <div class="w-1/2">
                    <label for="view-user" class="block font-semibold text-white mb-1">Vendedor</label>
                    <input id="view-user" type="text" readonly class="w-full p-2 rounded-lg bg-gray-700 text-white border-blue-500" data-target="user">
                </div>
            </div>
            <!-- Nome e Categoria na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="view-name" class="block font-semibold text-white mb-1">Nome</label>
                    <input id="view-name" readonly type="text" name="name" class="w-full p-2 rounded-lg bg-white text-black border-blue-500" data-target="name">
                </div>
                <div class="w-1/2">
                    <label for="view-category" class="block font-semibold text-white mb-1">Categoria</label>
                    <input id="view-category" readonly type="text" class="w-full p-2 rounded-lg bg-white text-black border-blue-500" data-target="category_name">
                </div>
            </div>
            <!-- Preço e Estoque na mesma linha -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="view-price" class="block font-semibold text-white mb-1">Preço</label>
                    <input id="view-price" readonly type="text" name="price" class="w-full p-2 rounded-lg bg-white text-green-700 border-blue-500 font-semibold" data-target="price">
                </div>
                <div class="w-1/2">
                    <label for="view-stock" class="block font-semibold text-white mb-1">Estoque</label>
                    <input id="view-stock" readonly type="number" step="0.01" name="stock" class="w-full p-2 rounded-lg bg-white text-black border-blue-500" data-target="stock">
                </div>
            </div>
            <div>
                <label for="view-description" class="block font-semibold text-white mb-1">Descrição</label>
                <textarea id="view-description" readonly name="description" class="w-full p-2 rounded-lg bg-white text-black border-blue-500 resize-none" data-target="description" rows="3"></textarea>
            </div>
            <!-- Botão -->
            <div class="mt-4 flex justify-center gap-4">
                <a id="viewProductPageBtn" href="#" target="_blank" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-gray-500 font-semibold transition">Ver Página</a>
                <button type="button" data-close class="px-6 py-2 bg-gray-400 text-gray-800 rounded-lg hover:bg-gray-500 font-semibold transition">Fechar</button>
            </div>
        </form>
    </div>
</div>