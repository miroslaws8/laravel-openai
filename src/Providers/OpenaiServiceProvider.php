<?php

namespace Itsimiro\OpenAI\Providers;

use Illuminate\Support\ServiceProvider;
use Itsimiro\OpenAI\Services\API\Auth\AuthService;
use Itsimiro\OpenAI\Services\API\Auth\AuthServiceInterface;
use Itsimiro\OpenAI\Services\OpenAI;

class OpenaiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/laravel-openai.php', 'laravel-openai');

        // Register the service the package provides.
        $this->app->singleton('laravel-openai', function ($app) {
            return new OpenAI($app);
        });

        $this->app->bind(AuthServiceInterface::class, function ($app) {
            return new AuthService();
        });
    }

    public function provides(): array
    {
        return [
            'laravel-openai'
        ];
    }

    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../../config/laravel-openai.php' => config_path('laravel-openai.php'),
        ], 'chatgpt-laravel.config');
    }
}