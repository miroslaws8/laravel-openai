<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Itsimiro\OpenAI\Enum\ImageResponseFormatEnum;
use Itsimiro\OpenAI\Enum\ImageSizeEnum;
use Spatie\LaravelData\Data;

class CreateImageParameters extends Data
{
    public function __construct(
        public string $prompt,
        public int $imageCount = 1,
        public ImageSizeEnum $size = ImageSizeEnum::LARGE,
        public ImageResponseFormatEnum $responseFormat = ImageResponseFormatEnum::URL,
        public string $user = ''
    )
    {}

    public function toArray(): array
    {
        return [
            'prompt' => $this->prompt,
            'n' => $this->imageCount,
            'size' => $this->size->value,
            'response_format' => $this->responseFormat->value,
            'user' => $this->user
        ];
    }
}