<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Illuminate\Support\Arr;
use Itsimiro\OpenAI\Services\API\Constants\ImageBodyParameters;
use Spatie\LaravelData\Data;

class Image extends Data
{
    public function __construct(
        public array $data
    )
    {}

    public function getUrl(): ?string
    {
        return Arr::get($this->data, ImageBodyParameters::URL);
    }

    public function getBase64(): ?string
    {
        return Arr::get($this->data, ImageBodyParameters::BASE64);
    }
}