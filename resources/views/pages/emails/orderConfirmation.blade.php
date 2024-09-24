<h1>Order Confirmation</h1>
<p>Thank you for your order, {{ $order->first_name }}!</p>
<p>Order ID: {{ $order->id }}</p>
<p>Total: ${{ number_format($order->total, 2) }}</p>
<p>We will notify you once your order is shipped.</p>
