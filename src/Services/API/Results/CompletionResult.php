<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Spatie\LaravelData\Data;

class CompletionResult extends Data implements ResultInterface
{
    public function __construct(public array $result)
    {}

    public function getId(): string
    {
        return $this->result[BodyParameters::ID];
    }

    public function getObject(): string
    {
        return $this->result[BodyParameters::OBJECT];
    }

    public function getCreateAt(): int
    {
        return $this->result[BodyParameters::CREATED_AT];
    }

    public function getModel(): string
    {
        return $this->result[BodyParameters::MODEL];
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