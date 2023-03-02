<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Spatie\LaravelData\Data;

class ChatParameters extends Data
{
    public function __construct(
        public string $modelName,
        public string $prompt,
        public int $maxTokens = 10,
        public int $temperature = 0,
        public int $topP = 1,
        public string $stop = '\n',
    )
    {}
}