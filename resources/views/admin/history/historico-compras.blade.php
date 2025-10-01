<x-app-layout>
    
    <div class="min-h-screen bg-sky-800 py-10 px-2 sm:px-8">
        <div class="max-w-5xl mx-auto bg-white/90 rounded-xl shadow-lg p-6">
            <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-6 gap-4">
                <h1 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3v4M8 3v4m-5 4h18" /></svg>
                    Histórico de Compras
                </h1>
                <a href="{{ route('admin.history.compras.pdf') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    Gerar PDF
                </a>
            </div>
            @if(isset($orders) && $orders->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow text-sm">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Produto</th>
                            <th class="py-3 px-4 text-left">Foto</th>
                            <th class="py-3 px-4 text-left">Data</th>
                            <th class="py-3 px-4 text-left">Valor</th>
                            <th class="py-3 px-4 text-left">Categoria</th>
                            <th class="py-3 px-4 text-left">Vendedor</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100">
                        @foreach($orders as $order)
                            @foreach($order->items as $item)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="py-2 px-4 font-semibold text-sky-900">{{ $item->product_name }}</td>
                                    <td class="py-2 px-4">
                                        @if($item->product && $item->product->photo_path)
                                            <img src="{{ asset('storage/' . $item->product->photo_path) }}" alt="foto" class="h-12 w-12 object-cover rounded-lg border border-blue-200 shadow-sm">
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 text-sky-800">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="py-2 px-4 text-blue-700 font-bold">R$ {{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}</td>
                                    <td class="py-2 px-4">{{ $item->product && $item->product->category ? $item->product->category->name : '-' }}</td>
                                    <td class="py-2 px-4">{{ $item->product && $item->product->user ? $item->product->user->name : '-' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-blue-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2M9 21h6a2 2 0 002-2v-2a6 6 0 00-12 0v2a2 2 0 002 2z" /></svg>
                <p class="text-blue-700 text-lg">Nenhuma compra encontrada.</p>
            </div>
            @endif
        </div>
    </div>
    
</x-app-layout>
