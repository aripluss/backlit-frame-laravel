<?php

namespace App\Traits;

trait Formatter
{
    public function formatPhone(string $phone): string
    {
        $digits = explode('-', $phone);
        $phone_formatted = implode('', $digits);
        return $phone_formatted;
    }
}