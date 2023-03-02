<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Spatie\LaravelData\Data;

class CompletionParameters extends Data
{
    public function __construct(
        public string $prompt,
        public string $model = 'text-davinci-003',
        public int $max_tokens = 10,
        public int $temperature = 0,
        public int $top_p = 1,
        public string $stop = '\n',
    )
    {}
}