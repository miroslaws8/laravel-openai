<?php

namespace Itsimiro\OpenAI\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Itsimiro\OpenAI\Services\AIModels\Dalle;
use Itsimiro\OpenAI\Services\AIModels\Davinci;
use Itsimiro\OpenAI\Services\AIModels\Whisper;

class OpenAI
{
    public function __construct(protected Container $container)
    {}

    /**
     * @throws BindingResolutionException
     */
    public function getDavinci(): Davinci
    {
        return $this->container->make(Davinci::class);
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDalle(): Dalle
    {
        return $this->container->make(Dalle::class);
    }

    /**
     * @throws BindingResolutionException
     */
    public function getWhisper(): Whisper
    {
        return $this->container->make(Whisper::class);
    }
}