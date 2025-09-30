<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $order = new \App\Models\Order();
        $order->user_id = $user->id;
        $order->status = 'pending';
        $order->total_price = 0;
        $order->save();

        $total = 0;
        foreach ($orderProducts as $prod) {
            // Espera-se que $prod tenha id, price, quantity, name
            $productId = $prod['id'] ?? null;
            $price = $prod['price'] ?? null;
            $qty = $prod['quantity'] ?? 1;
            $name = $prod['name'] ?? null;
            if (!$productId || !$price || !$name) continue;

            $order->orderItems()->create([
                'product_id' => $productId,
                'product_name' => $name,
                'unit_price' => $price,
                'quantity' => $qty,
            ]);
            $total += $price * $qty;
        }
        $order->total_price = $total;
        $order->save();

        // Aqui você pode iniciar o pagamento com PagSeguro usando $order e $order->orderItems
        // return redirect()->route('pagseguro.checkout', $order->id);

        return redirect()->route('home')->with('success', 'Pedido criado!');
    }
}
