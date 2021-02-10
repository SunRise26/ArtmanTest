<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ReCaptchaService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ReCaptchaService';
    }
}
