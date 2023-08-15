<?php

namespace Itsimiro\OpenAI\Enum;

enum ImageResponseFormatEnum: string
{
    case URL = 'url';
    case BASE64 = 'b64_json';
}
