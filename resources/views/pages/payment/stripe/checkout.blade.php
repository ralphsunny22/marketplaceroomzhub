@extends('layout.design')
@section('title')Stripe Checkout :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')
    <h2>Proceed to Payment</h2>

    <form id="payment-form">
        <div id="card-element">
            <!-- Stripe will insert the card input form here -->
        </div>
        <button id="submit">Pay ${{ number_format($order->total, 2) }}</button>
        <div id="card-errors" role="alert"></div>
    </form>
@endsection

@section('extra_js')
<script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const { paymentIntent, error } = await stripe.confirmCardPayment('{{ $clientSecret }}', {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: '{{ $order->first_name }} {{ $order->last_name }}',
                        email: '{{ $order->email }}',
                    },
                },
            });

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else if (paymentIntent.status === 'succeeded') {
                // Redirect to payment success route
                window.location.href = '{{ route('payment.success', $order->id) }}';
            }
        });
    </script>

@endsection
