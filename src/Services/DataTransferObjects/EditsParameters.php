<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Spatie\LaravelData\Data;

class EditsParameters extends Data
{
    public function __construct(
        public string $instruction,
        public string $input,
        public string $model = 'text-davinci-edit-001',
        public int $n = 1,
        public int $temperature = 1,
        public int $top_p = 1
    )
    {}
}