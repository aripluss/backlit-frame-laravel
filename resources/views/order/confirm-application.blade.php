<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Підтвердження замовлення</title>
</head>

<body>
    <h1>{{ App\Models\Order::greeting() }}</h1>
    <p>{{ $order->getSummary() }}</p>

    <div class="back-to-site">
        <a href="/backlit-frame" class="btn btn-link">⬅ Повернутися до сайту</a>
    </div>


    <!-- З сесії -->
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
</body>

</html>