<?php

namespace Itsimiro\OpenAI\Tests\Unit\AIModels;

use Illuminate\Contracts\Container\BindingResolutionException;
use Itsimiro\OpenAI\Services\AIModels\Davinci;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\ChatResult;
use Itsimiro\OpenAI\Services\API\Results\CompletionResult;
use Itsimiro\OpenAI\Services\API\Results\EditsResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use Itsimiro\OpenAI\Services\DataTransferObjects\ChatParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\CompletionParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\EditsParameters;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class DavinciTest extends TestCase
{
    /**
     * @return void
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function testCompletion(): void
    {
        $app = app();

        $resultObject = $this->createMock(CompletionResult::class);
        $resultObject->method('getId')->willReturn('test');

        $apiService = $this->createMock(ApiService::class);
        $app->bind(ApiService::class, fn() => $apiService);
        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $model = $app->make(Davinci::class);

        $params = $this->createMock(CompletionParameters::class);

        $result = $model->completion($params);

        $this->assertEquals('test', $result->getId());
    }

    /**
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function testChat(): void
    {
        $app = app();

        $expectedMessage = [
            'role' => 'assistant',
            'content' => 'test'
        ];

        $resultObject = $this->createMock(ChatResult::class);
        $resultObject->method('getChoices')->willReturn([
            'message' => $expectedMessage
        ]);

        $apiService = $this->createMock(ApiService::class);
        $app->bind(ApiService::class, fn() => $apiService);

        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $model = $app->make(Davinci::class);

        $params = $this->createMock(ChatParameters::class);

        $result = $model->chat($params);

        $this->assertEquals($expectedMessage, $result->getChoices()['message']);
    }

    /**
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function testEdits(): void
    {
        $app = app();

        $expectedChoices = [
            [
                'text' => 'Test'
            ]
        ];

        $resultObject = $this->createMock(EditsResult::class);
        $resultObject->method('getChoices')->willReturn($expectedChoices);

        $apiService = $this->createMock(ApiService::class);
        $app->bind(ApiService::class, fn() => $apiService);

        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $model = $app->make(Davinci::class);

        $params = $this->createMock(EditsParameters::class);

        $result = $model->edits($params);

        $this->assertEquals($expectedChoices, $result->getChoices());
        $this->assertEquals($expectedChoices[0]['text'], $result->getChoices()[0]['text']);
    }
}