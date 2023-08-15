<?php

namespace Itsimiro\OpenAI\Tests\Unit\AIModels;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Itsimiro\OpenAI\Services\AIModels\Dalle;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Constants\ImageBodyParameters;
use Itsimiro\OpenAI\Services\API\Results\CreateImageResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use Itsimiro\OpenAI\Services\DataTransferObjects\CreateImageParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\Image;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class DalleTest extends TestCase
{
    private Container $app;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app = app();
    }

    /**
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function testCreateImage(): void
    {
        $expectedImage = new Image([
            ImageBodyParameters::URL => 'test url',
            ImageBodyParameters::BASE64 => '{"base64": "test"}',
        ]);

        $resultObject = $this->createMock(CreateImageResult::class);
        $resultObject->method('getImages')->willReturn([
            $expectedImage
        ]);

        $apiService = $this->createMock(ApiService::class);
        $this->app->bind(ApiService::class, fn() => $apiService);
        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $this->app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $params = $this->createMock(CreateImageParameters::class);

        $model = $this->app->make(Dalle::class);

        $result = $model->createImage($params);

        $this->assertCount(1, $result->getImages());
        $this->assertEquals($expectedImage->getUrl(), $result->getImages()[0]->getUrl());
    }
}