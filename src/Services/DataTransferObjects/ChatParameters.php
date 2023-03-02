<?php

namespace Itsimiro\OpenAI\Services\DataTransferObjects;

use Spatie\LaravelData\Data;

class ChatParameters extends Data
{
    public function __construct(
        public string $model = 'gpt-3.5-turbo',
        public array $messages = [
            [
                'role' => 'user',
                'content' => 'Hello world'
            ]
        ]
    )
    {}
}