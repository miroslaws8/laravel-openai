<?php

namespace Itsimiro\OpenAI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Itsimiro\OpenAI\Services\OpenAI davinci()
 */
class OpenAI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-openai';
    }
}