<?php

namespace Itsimiro\OpenAI\Facades;

use Illuminate\Support\Facades\Facade;

class OpenAI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-openai';
    }
}