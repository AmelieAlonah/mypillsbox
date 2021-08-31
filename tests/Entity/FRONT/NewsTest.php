<?php

namespace App\Tests\Entity\FRONT;

use App\Entity\FRONT\News;
use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    public function testNewsIsTrue(): void
    {
        $news = new News;

        $news->setTitle('Title');
        $news->setContent('Content');

        $this->assertTrue($news->getTitle() === 'Title');
        $this->assertTrue($news->getContent() === 'Content');
    }

    public function testNewsIsFalse(): void
    {
        $news = new News;

        $news->setTitle('Title');
        $news->setContent('Content');

        $this->assertFalse($news->getTitle() !== 'Title');
        $this->assertFalse($news->getContent() !== 'Content');
    }

    public function testNewsIsEmpty(): void
    {
        $news = new News;

        $this->assertEmpty($news->getId());
        $this->assertEmpty($news->getTitle());
        $this->assertEmpty($news->getContent());
    }
}
