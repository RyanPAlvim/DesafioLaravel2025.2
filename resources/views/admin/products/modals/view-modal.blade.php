<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg">

        <input type="text" readonly="readonly" default="{{ $product->id }}">
        <input type="text" readonly="readonly" default="{{ $product->name }}">
        <input type="text" readonly="readonly" default="{{ $product->price }}">
        <input type="text" readonly="readonly" default="{{ $product->stock }}">
        <input type="text" readonly="readonly" default="{{ $product->name }}">

        <div class="flex justify-end gap-4">
            <button type="button" id="closeButton" class="text-gray-700 px-4 py-2 bg-gray-400 rounded-lg hover:bg-gray-500 font-semibold">Fechar</button> 
        </div>
    </div>
</div>