<?php

namespace Itsimiro\OpenAI\Enum;

enum OpenAIModelsEnum: string
{
    case CHAT_MODEL = 'gpt-3.5-turbo';
    case CHAT_MODEL_0301 = 'gpt-3.5-turbo-0301';
    case COMPLETION_MODEL_002 = 'text-davinci-002';
    case COMPLETION_MODEL_003 = 'text-davinci-003';
    case EDITS_MODEL_003 = 'text-davinci-edit-001';
    case EDITS_CODE_MODEL_003 = 'code-davinci-edit-001';
    case AUDIO_MODEL = 'whisper-1';
}
