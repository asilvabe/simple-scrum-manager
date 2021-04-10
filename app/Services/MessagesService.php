<?php

namespace App\Services;

use App\Enums\Messages;

class MessagesService
{
    public const TYPES = [
        Messages::INFO => 'info',
        Messages::SUCCESS => 'success',
        Messages::WARNING => 'warning',
        Messages::ERROR => 'danger',
    ];

    public function hasMessage(string $messageType = null): bool
    {
        $types = $messageType ? (array) $messageType : Messages::supported();

        foreach($types as $type) {
            if (session()->get($type)) {
                return true;
            }
        }

        return false;
    }

    public function message(): array
    {
        foreach (Messages::supported() as $message) {
            if ($content = session()->get($message)) {
                return [
                    'type' => self::TYPES[$message],
                    'content' => $content,
                ];
            }
        }
        return [];
    }

    public function notify(array $message = null): string
    {
        return view('partials.messages.notification', $message ?? $this->message())->render();
    }
}
