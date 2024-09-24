@extends('layout.design')
@section('title')Stripe Checkout :: Marketplace @endsection

@section('extra_css')@endsection

@section('content')
    <h2>Thank you for your order!</h2>
    <p>Your order ID is {{ $order->id }}. We've sent a confirmation to {{ $order->email }}.</p>
@endsection

@section('extra_js')
