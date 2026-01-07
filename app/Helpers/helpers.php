<?php

use Illuminate\Support\Number;

if (!function_exists('currencyIDR')) {
    function currencyIDR($price)
    {
        return Number::currency($price, in: 'IDR', locale: 'id', precision: 0);
    }
}
