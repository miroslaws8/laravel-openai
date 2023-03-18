<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

class ModelsResult extends Data implements ResultInterface
{
    public function __construct(public array $result)
    {}

    public function getModels(): Collection
    {
        return Collection::make($this->result['data'])->map(
            fn (array $item) => new ModelResult($item)
        );
    }
}