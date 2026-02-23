<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public string $name;
    public string $phone;
    public string $contactMethod;

    public function __construct($name = '', $phone = '', $contactMethod = '')
    {
        parent::__construct();

        $this->name = $name;
        $this->phone = $phone;
        $this->contactMethod = $contactMethod;
    }

    public function getSummary()
    {
        return "Зв'язатися з клієнтом $this->name через $this->contactMethod, контакт - $this->phone";
    }

    public static function greeting()
    {
        return "Дякуємо, скоро зв'яжемося з Вами!";
    }
}
