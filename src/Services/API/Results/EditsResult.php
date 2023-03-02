<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Spatie\LaravelData\Data;

class EditsResult extends Data implements ResultInterface
{
    public function __construct(public array $result)
    {}

    public function getCreateAt(): int
    {
        return $this->result[BodyParameters::CREATED_AT];
    }

    public function getChoices(): array
    {
        return $this->result[BodyParameters::CHOICES];
    }

    public function getUsage(): array
    {
        return $this->result[BodyParameters::USAGE];
    }
}