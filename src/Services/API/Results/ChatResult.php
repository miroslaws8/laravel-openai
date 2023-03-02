<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Spatie\LaravelData\Data;

class ChatResult extends Data implements ResultInterface
{
    public function __construct(public array $result)
    {}
}