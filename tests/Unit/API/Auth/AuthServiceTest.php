<?php

namespace Itsimiro\OpenAI\Tests\Unit\API\Auth;

use Itsimiro\OpenAI\Services\API\Auth\AuthService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class AuthServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetToken(): void
    {
        $authService = $this->createMock(AuthService::class);
        $authService->method('getToken')->willReturn('token');

        $this->assertEquals('token', $authService->getToken());
    }
}