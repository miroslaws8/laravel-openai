# Laravel OpenAI

A laravel package to integrate openai in laravel application.



<p align="left">
    <a href="https://github.com/miroslaws8/laravel-openai/actions"><img alt="GitHub Workflow Status (master)" src="https://github.com/miroslaws8/laravel-openai/actions/workflows/test.yml/badge.svg"></a>
    <img alt="Packagist Downloads" src="https://img.shields.io/packagist/dm/itsimiro/laravel-openai">
    <a href="https://packagist.org/packages/itsimiro/laravel-openai"><img alt="Latest Version" src="https://img.shields.io/packagist/v/itsimiro/laravel-openai"></a>
</p>

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
* Models
  * [List models](https://platform.openai.com/docs/api-reference/models/list)
  * [Retrieve model](https://platform.openai.com/docs/api-reference/models/retrieve)
* Images
  * [Create image](https://platform.openai.com/docs/api-reference/images/create)

#### Coming soon:
* Images
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

#### Create image:

```php
$openAI = $this->container->make(\Itsimiro\OpenAI\Services\OpenAI::class);


$result = $openAI->getDalle()->createImage(new CreateImageParameters(
  'dog with a bone',
  2,
  responseFormat: ImageResponseFormatEnum::URL
 ));

$result->getImages(); // Generated images
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
