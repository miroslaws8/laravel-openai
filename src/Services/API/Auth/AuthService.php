<?php

namespace Itsimiro\OpenAI\Services\API\Auth;

class AuthService
{
    public function getToken(): string
    {
        return config('laravel-openai.token');
    }
}