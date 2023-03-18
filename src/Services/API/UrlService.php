<?php

namespace Itsimiro\OpenAI\Services\API;

class UrlService
{
    public function completions(): string
    {
        return $this->buildUrl('/completions');
    }

    public function edits(): string
    {
        return $this->buildUrl('/edits');
    }

    public function classifications(): string
    {
        return $this->buildUrl('/classifications');
    }

    public function moderationUrl(): string
    {
        return $this->buildUrl('/moderations');
    }

    public function files(): string
    {
        return $this->buildUrl('/files');
    }

    public function fineTune(): string
    {
        return $this->buildUrl('/fine-tunes');
    }

    public function models(): string
    {
        return $this->buildUrl('/models');
    }

    public function answers(): string
    {
        return $this->buildUrl('/answers');
    }

    public function images(): string
    {
        return $this->buildUrl('/images');
    }

    public function embeddings(): string
    {
        return $this->buildUrl('/embeddings');
    }

    public function chat(): string
    {
        return $this->buildUrl('/chat/completions');
    }

    public function buildUrl(string $endpoint): string
    {
        return $this->getBaseUrl().rtrim($endpoint, '/');
    }

    public function getBaseUrl(): string
    {
        return config('laravel-openai.base_url');
    }
}