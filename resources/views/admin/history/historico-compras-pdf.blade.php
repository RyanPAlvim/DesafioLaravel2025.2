<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Compras</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; color: #222; }
        h2 { color: #2563eb; text-align: center; margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #2563eb; padding: 8px; text-align: left; }
        th { background: #2563eb; color: #fff; }
        tr:nth-child(even) { background: #e0f2fe; }
        .small { font-size: 11px; color: #555; }
    </style>
</head>
<body>
    <h2>Relatório de Compras</h2>
    <p class="small">Período: {{ isset($start) ? $start->format('d/m/Y') : '-' }} até {{ isset($end) ? $end->format('d/m/Y') : '-' }}</p>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>R$ {{ number_format($item->unit_price * $item->quantity, 2, ',', '.') }}</td>
                    <td>{{ $item->product && $item->product->category ? $item->product->category->name : '-' }}</td>
                    <td>{{ $item->product && $item->product->user ? $item->product->user->name : '-' }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</body>
</html>
