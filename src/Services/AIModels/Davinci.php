<?php

namespace Itsimiro\OpenAI\Services\AIModels;

use GuzzleHttp\Exception\GuzzleException;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\ChatResult;
use Itsimiro\OpenAI\Services\API\Results\CompletionResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use Itsimiro\OpenAI\Services\DataTransferObjects\ChatParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\DavinciParameters;

class Davinci
{
    public function __construct(private readonly ApiService $apiService, private readonly UrlService $urlService)
    {}

    /**
     * @see https://platform.openai.com/docs/api-reference/completions
     *
     * @throws GuzzleException
     */
    public function completion(DavinciParameters $parameters): CompletionResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('POST', $this->urlService->completions(), $parameters->toArray()),
            CompletionResult::class
        );
    }

    /**
     * @see https://platform.openai.com/docs/api-reference/chat
     *
     * @throws GuzzleException
     */
    public function chat(ChatParameters $parameters): ChatResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('POST', $this->urlService->completions(), $parameters->toArray()),
            ChatResult::class
        );
    }
}