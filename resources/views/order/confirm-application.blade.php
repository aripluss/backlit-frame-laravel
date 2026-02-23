@extends('layouts.app')

@section('title', 'Замовлення прийнято')

@section('content')

    <section>
        <div class="container">
            <h1>Дякуємо за замовлення!</h1>
            <p>{{ $order->getSummary() }}</p>
    </section>
    <section>
        <div class="container">
            <div>
                <a href="/backlit-frame" class="btn btn--secondary">⬅ Повернутися до сайту</a>
            </div>
        </div>
        </div>
    </section>

    <section>
        <div class="container">
            @php
                $lastOrder = session('last_order');
            @endphp
            @if($lastOrder)
                <h3>Останнє замовлення:</h3>
                <ul>
                    <li><strong>Замовник:</strong> {{ $lastOrder->name }}</li>
                    <li><strong>Телефон:</strong> {{ $lastOrder->phone }}</li>
                    <li><strong>Метод зв'язку:</strong> {{ $lastOrder->contactMethod }}</li>
                </ul>
            @endif
        </div>
    </section>

@endsection