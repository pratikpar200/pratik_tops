<p>Thank you for your order!</p>
<p><strong>Order ID:</strong> {{ $order->id }}</p>
<p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
<p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
