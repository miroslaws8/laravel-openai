<?php

namespace Itsimiro\OpenAI\Enum;

enum ImageSizeEnum: string
{
    case SMALL = '256x256';
    case MEDIUM = '512x512';
    case LARGE = '1024x1024';
}
