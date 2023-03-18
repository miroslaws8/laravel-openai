<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class ModelsResult extends Data implements ResultInterface
{
    public function __construct(public array $result)
    {}

    public function getModels(): DataCollection
    {
        return ModelResult::collection($this->result['data']);
    }
}