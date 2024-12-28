<?php

declare(strict_types=1);

namespace App\Domain\Post\Entity;

use App\Infrastructure\Persistence\Post\CycleORMPostRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(
    repository: CycleORMPostRepository::class,
)]
class Post
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    #[Column(type: 'primary')]
    private int $id;

    public function __construct(
        #[Column(type: 'string')]
        private string $title,
        #[Column(type: 'string')]
        private string $text,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
