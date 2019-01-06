<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MoneyFormatter;

class ProductController extends Controller
{
    public function index()
    {
        $value = 1000000;
        $formatter = new MoneyFormatter($value);
        dump($formatter->formatted());
    }
}
