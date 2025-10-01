<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoryController extends Controller
{
    // Histórico de Compras
    public function compras(Request $request)
    {
        $user = Auth::user();
        $orders = Order::with(['items.product.category', 'items.product.user'])
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
        return view('admin.history.historico-compras', compact('orders'));
    }

    // Geração de PDF do histórico de compras
    public function comprasPdf(Request $request)
    {
        $user = Auth::user();
        $start = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::create(2000, 1, 1, 0, 0, 0);
        $end = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::now();
        $orders = Order::with(['items.product.category', 'items.product.user'])
            ->where('user_id', $user->id)
            ->whereBetween('created_at', [$start, $end])
            ->orderByDesc('created_at')
            ->get();
        $pdf = Pdf::loadView('admin.history.historico-compras-pdf', compact('orders', 'start', 'end'));
        return $pdf->stream('historico-compras.pdf');
    }

    // Histórico de Vendas
    public function vendas(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;
        $query = OrderItem::with(['order.user', 'product.category', 'product.user']);
        if (!$isAdmin) {
            $query->whereHas('product', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }
        $orderItems = $query->orderByDesc('created_at')->get();
        return view('admin.history.historico-vendas', compact('orderItems'));
    }

    // Geração de PDF do histórico de vendas
    public function vendasPdf(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->is_admin ?? false;
        $start = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : Carbon::create(2000, 1, 1, 0, 0, 0);
        $end = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : Carbon::now();
        $query = OrderItem::with(['order.user', 'product.category', 'product.user'])
            ->whereBetween('created_at', [$start, $end]);
        if (!$isAdmin) {
            $query->whereHas('product', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }
        $orderItems = $query->orderByDesc('created_at')->get();
        $pdf = Pdf::loadView('admin.history.historico-vendas-pdf', compact('orderItems', 'start', 'end'));
        return $pdf->stream('historico-vendas.pdf');
    }
}
