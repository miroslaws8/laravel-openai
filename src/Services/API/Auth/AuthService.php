<?php

namespace Itsimiro\OpenAI\Services\API\Auth;

class AuthService implements AuthServiceInterface
{
    public function getToken(): string
    {
        return config('laravel-openai.api_key');
    }
}