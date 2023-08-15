<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Itsimiro\OpenAI\Services\API\Constants\BodyParameters;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\ArrayType;

class CompletionResult extends Data implements ResultInterface
{
    public function __construct(
        #[ArrayType([
            BodyParameters::ID,
            BodyParameters::OBJECT,
            BodyParameters::CREATED_AT,
            BodyParameters::MODEL,
            BodyParameters::CHOICES,
            BodyParameters::USAGE
        ])]
        public array $result
    )
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