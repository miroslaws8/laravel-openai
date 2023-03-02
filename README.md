# Laravel OpenAI

A laravel package to integrate openai in laravel application.


## Installation

You can install the package via composer:

```bash
composer require itsimiro/laravel-openai
```

Publish the configuration file:

```
php artisan vendor:publish --provider="Itsimiro\OpenAI\Providers\OpenaiServiceProvider"
```

This will create a config/laravel-openai.php configuration file in your project. Be sure to specify the key in your environment file.

```
OPENAI_API_KEY=sk-*
```

## Endpoint Support

#### Available now:

* Completions
  * [Create completion](https://platform.openai.com/docs/api-reference/completions/create)
* Chat
  * [Create chat completion](https://platform.openai.com/docs/api-reference/chat/create)
* Edits
  * [Create edit](https://platform.openai.com/docs/api-reference/edits/create)

#### Coming soon:

* Models
  * List models
  * Retrieve model
* Images
  * Create image
  * Create image edit
* Audio
  * Create transcription
  * Create translation
* Embeddings
  * Create embeddings

## Usage

#### Create completion:

```php
$openAI = $this->container->make(\Itsimiro\OpenAI\Services\OpenAI::class);

$result = $openAI->getDavinci()->completion(new \Itsimiro\OpenAI\Services\DataTransferObjects\CompletionParameters()); // Itsimiro\OpenAI\Services\API\Results\CompletionResult

$result->getChoices(); // Choices from OpenAI.

```

#### Create chat:

```php
$openAI = $this->container->make(\Itsimiro\OpenAI\Services\OpenAI::class);

$result = $openAI->getDavinci()->chat(new ChatParameters()); // Itsimiro\OpenAI\Services\API\Results\CompletionResult

$result->getChoices(); // Choices from OpenAI.

```

#### See the [documentation](https://platform.openai.com/docs/api-reference) for more details on using OpenAI.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
