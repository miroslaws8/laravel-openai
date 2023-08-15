<?php

namespace Unit\AIModels;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use Itsimiro\OpenAI\Services\AIModels\General;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\ModelResult;
use Itsimiro\OpenAI\Services\API\Results\ModelsResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class GeneralTest extends TestCase
{
    /**
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function testGetModels(): void
    {
        $app = app();

        $expectedModel = $this->getMockModel();

        $dataCollection = $this->getMockBuilder(Collection::class)
            ->setConstructorArgs([
                'items' => []
            ])->getMock();

        $dataCollection->method('first')->willReturn(new ModelResult($expectedModel));

        $resultObject = $this->createMock(ModelsResult::class);
        $resultObject->method('getModels')->willReturn($dataCollection);

        $apiService = $this->createMock(ApiService::class);
        $app->bind(ApiService::class, fn() => $apiService);
        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $model = $app->make(General::class);

        $result = $model->getModels();

        $this->assertEquals($expectedModel['id'], $result->getModels()->first()->getId());
    }

    /**
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function testRetrieveModel(): void
    {
        $app = app();

        $modelId = 'testModel';

        $resultObject = $this->createMock(ModelResult::class);
        $resultObject->method('getId')->willReturn($modelId);

        $apiService = $this->createMock(ApiService::class);
        $app->bind(ApiService::class, fn() => $apiService);
        $apiService->expects($this->once())->method('getResult')->willReturn($resultObject);

        $app->bind(UrlService::class, fn() => $this->createMock(UrlService::class));

        $model = $app->make(General::class);

        $result = $model->retrieveModel($modelId);

        $this->assertEquals($modelId, $result->getId());
    }

    private function getMockModel(): array
    {
        return [
            'id' => 'text-davinci-003',
            'object' => 'model',
            'owned_by'=> 'openai',
            'permission' => []
        ];
    }
}