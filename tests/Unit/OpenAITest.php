<?php

namespace Itsimiro\OpenAI\Tests\Unit;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Itsimiro\OpenAI\Providers\OpenaiServiceProvider;
use Itsimiro\OpenAI\Services\AIModels\Dalle;
use Itsimiro\OpenAI\Services\AIModels\Davinci;
use Itsimiro\OpenAI\Services\AIModels\Whisper;
use Itsimiro\OpenAI\Services\OpenAI;
use PHPUnit\Framework\TestCase;

class OpenAITest extends TestCase
{
    /**
     * @throws BindingResolutionException
     */
    public function testGetDavinci(): void
    {
        $app = app();

        $app->bind('config', fn () => new Repository([
            'laravel-openai' => [
                'api_key' => 'test',
            ],
        ]));

        (new OpenaiServiceProvider($app))->register();
        $openAI = (new OpenAI($app));

        $this->assertInstanceOf(Davinci::class, $openAI->getDavinci());
    }

    /**
     * @throws BindingResolutionException
     */
    public function testGetDalle(): void
    {
        $app = app();

        $app->bind('config', fn () => new Repository([
            'laravel-openai' => [
                'api_key' => 'test',
            ],
        ]));

        (new OpenaiServiceProvider($app))->register();
        $openAI = (new OpenAI($app));

        $this->assertInstanceOf(Dalle::class, $openAI->getDalle());
    }

    /**
     * @throws BindingResolutionException
     */
    public function testGetWhisper(): void
    {
        $app = app();

        $app->bind('config', fn () => new Repository([
            'laravel-openai' => [
                'api_key' => 'test',
            ],
        ]));

        (new OpenaiServiceProvider($app))->register();
        $openAI = (new OpenAI($app));

        $this->assertInstanceOf(Whisper::class, $openAI->getWhisper());
    }
}