<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Traits\Formatter;
use App\Models\Order;

class ContactRequestFormController extends Controller
{
    use Formatter;

    public function submit(Request $request)
    {
        $fields = ['user_name', 'phone', 'contact_method'];
        foreach ($fields as $field) {
            $$field = $request->input($field, '');
        }


        $phone_formatted = $this->formatPhone($phone);

        $order = new Order($user_name, $phone_formatted, $contact_method);


        $lifetime = config('shop.cookie_lifetime');
        // cookie()->queue('last_user', $user_name, $lifetime); // шифрує, не підходить для зберігання імені
        setcookie('last_user', $user_name, time() + $lifetime, '/');

        session(['last_order' => $order]);

        // Blade шаблон
        return view('order.confirm-application', [
            'order' => $order,
            'user_name' => $user_name,
        ]);
    }

    public function lastOrder()
    {
        $lastOrder = session('last_order');

        return view('order/last-order', [
            'lastOrder' => $lastOrder
        ]);
    }
}
