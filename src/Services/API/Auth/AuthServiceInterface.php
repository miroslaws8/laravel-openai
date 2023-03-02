<?php

namespace Itsimiro\OpenAI\Services\API\Auth;

interface AuthServiceInterface
{
    public function getToken(): string;
}