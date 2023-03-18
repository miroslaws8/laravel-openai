<?php

namespace Itsimiro\OpenAI\Services\AIModels;

use GuzzleHttp\Exception\GuzzleException;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\ModelResult;
use Itsimiro\OpenAI\Services\API\Results\ModelsResult;
use Itsimiro\OpenAI\Services\API\UrlService;

class General
{
    public function __construct(private readonly ApiService $apiService, private readonly UrlService $urlService)
    {}

    /**
     * @throws GuzzleException
     */
    public function getModels(): ModelsResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('GET', $this->urlService->models()),
            ModelsResult::class
        );
    }

    /**
     * @throws GuzzleException
     */
    public function retrieveModel(string $modelId): ModelResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('POST', $this->urlService->models().'/'.$modelId),
            ModelResult::class
        );
    }
}