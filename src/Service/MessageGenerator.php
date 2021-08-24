<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class MessageGenerator
{
    private $logger;

    private $isRandom;

    public function __construct(LoggerInterface $logger, bool $isRandom = false)
    {
        $this->logger = $logger;

        $this->isRandom = $isRandom;
    }

    private $messages = [
        'La santé avant tout !',
        'J\'espère qu\'il n\'est pas trop tard...',
        'Bon travail !',
    ];

    public function getRandomMessage()
    {
        if ($this->isRandom) {
            $message = $this->messages[array_rand($this->messages)];
        }

        return $message;
    }
}