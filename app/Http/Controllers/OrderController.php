<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        // Recebe os produtos enviados pelo form (json)
        $orderProducts = json_decode($request->input('orderProducts'), true);
        if (!$orderProducts || !is_array($orderProducts) || count($orderProducts) === 0) {
            return back()->with('error', 'Nenhum produto selecionado.');
        }

        // Cria o pedido
        $order = new Order();
        $order->user_id = $user->id;
        $order->status = 'preparando';
        $order->total_price = 0;
        $order->save();

        $total = 0;
        foreach ($orderProducts as $prod) {
            
            $productId = $prod['id'] ?? null;
            $price = $prod['price'] ?? null;
            $qty = $prod['quantity'] ?? 1;
            $name = $prod['name'] ?? null;
            if (!$productId || !$price || !$name) continue;

            $order->items()->create([
                'product_id' => $productId,
                'product_name' => $name,
                'unit_price' => $price,
                'quantity' => $qty,
            ]);
            $total += $price * $qty;
        }
        $order->total_price = $total;
        $order->save();

        // Integração com PagSeguro

        $url = config('services.pagseguro.checkout_url');
        $token = config('services.pagseguro.token');

        $items = $order->items->map(function ($item) {
            return [
                'name' => $item->product_name,
                'quantity' => $item->quantity,
                'unit_amount' => $item->unit_price * 100,
            ];
        })->toArray();

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => 'application/json',
        ])->withoutVerifying()->post($url, [
            'reference_id' => (string)$order->id,
            'items' => $items,
        ]);

        if ($response->failed()) {
            
            $order->items()->delete();
            $order->delete();
            return redirect()->route('purchase-error');
        }

        if ($response->successful()) {
            // Atualiza saldo do vendedor e estoque dos produtos
            foreach ($order->items as $item) {
                $product = $item->product;
                if ($product) {
                    
                    $product->stock = max(0, $product->stock - $item->quantity);
                    $product->save();
                    
                    $seller = $product->user;
                    if ($seller) {
                        $seller->saldo = $seller->saldo + ($item->unit_price * $item->quantity);
                        $seller->save();
                    }
                }
            }
            $pay_link = data_get($response->json(), 'links.1.href');
            if ($pay_link) {
                return redirect()->away($pay_link);
            }
            
            $order->items()->delete();
            $order->delete();
            return redirect()->route('purchase-error');
        }

        
        return redirect()->route('home')->with('success', 'Pedido criado!');
    }

    public function purchaseError()
    {
        return view('purchase-error');
    }
}
