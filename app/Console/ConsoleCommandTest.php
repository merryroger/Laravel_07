<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;

class ConsoleCommandTest
{
    public function __invoke()
    {
        Log::alert('test invokable');
    }
}