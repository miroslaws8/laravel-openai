<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Illuminate\Support\Arr;
use Itsimiro\OpenAI\Services\API\Constants\BodyParameters;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class ModelResult extends Data implements ResultInterface
{
    public function __construct(
        #[ArrayType([
            BodyParameters::ID,
            BodyParameters::OBJECT,
            BodyParameters::OWNER_BY
        ])]
        public array $result
    )
    {}

    public function getId(): string
    {
        return Arr::get($this->result, BodyParameters::ID, '');
    }

    public function getObject(): string
    {
        return Arr::get($this->result, BodyParameters::OBJECT, '');
    }

    public function getOwner(): string
    {
        return Arr::get($this->result, BodyParameters::OWNER_BY, '');
    }

    public function getPermissions(): array
    {
        return Arr::get($this->result, BodyParameters::PERMISSIONS, []);
    }
}