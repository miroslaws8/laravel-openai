<?php

namespace Itsimiro\OpenAI\Services\API\Results;

use Illuminate\Support\Arr;
use Itsimiro\OpenAI\Services\API\Constants\ImageBodyParameters;
use Itsimiro\OpenAI\Services\DataTransferObjects\Image;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class CreateImageResult extends Data implements ResultInterface
{
    public function __construct(
        #[ArrayType([
            ImageBodyParameters::CREATED,
            ImageBodyParameters::DATA,
        ])]
        public array $result
    )
    {}

    public function getImages(): array
    {
        return array_map(
            fn (array $image) => new Image($image),
            Arr::get($this->result, ImageBodyParameters::DATA, [])
        );
    }

    public function getCreatedDate()
    {
        return Arr::get($this->result, ImageBodyParameters::CREATED);
    }
}