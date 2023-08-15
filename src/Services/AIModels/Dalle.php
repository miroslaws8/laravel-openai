<?php

namespace Itsimiro\OpenAI\Services\AIModels;

use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\CreateImageResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use Itsimiro\OpenAI\Services\DataTransferObjects\CreateImageParameters;

class Dalle
{
    public function __construct(private readonly ApiService $apiService, private readonly UrlService $urlService)
    {}

    public function createImage(CreateImageParameters $parameters): CreateImageResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('POST', $this->urlService->createImage(), $parameters->toArray()),
            CreateImageResult::class
        );
    }
}