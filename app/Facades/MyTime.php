<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MyTime extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MyTime';
    }
}
