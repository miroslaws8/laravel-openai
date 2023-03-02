<?php

namespace Itsimiro\OpenAI\Services\AIModels;

use GuzzleHttp\Exception\GuzzleException;
use Itsimiro\OpenAI\Services\API\ApiService;
use Itsimiro\OpenAI\Services\API\Results\ChatResult;
use Itsimiro\OpenAI\Services\API\Results\CompletionResult;
use Itsimiro\OpenAI\Services\API\Results\EditsResult;
use Itsimiro\OpenAI\Services\API\UrlService;
use Itsimiro\OpenAI\Services\DataTransferObjects\ChatParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\CompletionParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\EditsParameters;

class Davinci
{
    public function __construct(private readonly ApiService $apiService, private readonly UrlService $urlService)
    {}

    /**
     * @see https://platform.openai.com/docs/api-reference/completions
     *
     * @throws GuzzleException
     */
    public function completion(CompletionParameters $parameters): CompletionResult
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
            $this->apiService->sendRequest('POST', $this->urlService->chat(), $parameters->toArray()),
            ChatResult::class
        );
    }

    /**
     * @see https://platform.openai.com/docs/api-reference/edits
     *
     * @throws GuzzleException
     */
    public function edits(EditsParameters $parameters): EditsResult
    {
        return $this->apiService->getResult(
            $this->apiService->sendRequest('POST', $this->urlService->edits(), $parameters->toArray()),
            EditsResult::class
        );
    }
}