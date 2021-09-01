<?php

namespace App\Tests\Entity\FRONT;

use App\Entity\FRONT\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public function testMessageIsTrue(): void
    {
        $message = new Message;
        $subject = [];

        $message->setName('Message');
        $message->setEmail('email@email.fr');
        $message->setSubject($subject);
        $message->setContent('Content');

        $this->assertTrue($message->getName() === 'Message');
        $this->assertTrue($message->getEmail() === 'email@email.fr');
        $this->assertTrue($message->getSubject() === $subject);
        $this->assertTrue($message->getContent() === 'Content');

    }

    public function testMessageIsFalse(): void
    {
        $message = new Message;
        $subject = [];

        $message->setName('Message');
        $message->setEmail('email@email.fr');
        $message->setSubject($subject);
        $message->setContent('Content');

        $this->assertFalse($message->getName() !== 'Message');
        $this->assertFalse($message->getEmail() !== 'email@email.fr');
        $this->assertFalse($message->getSubject() !== $subject);
        $this->assertFalse($message->getContent() !== 'Content');

    }

    public function testMessageIsEmpty(): void
    {
        $message = new Message;

        $this->assertEmpty($message->getId());
        $this->assertEmpty($message->getName());
        $this->assertEmpty($message->getEmail());
        $this->assertEmpty($message->getSubject());
        $this->assertEmpty($message->getContent());

    }
}
