<?php

declare(strict_types=1);

namespace App\Domain\Post\Service;

use Cycle\ORM\EntityManagerInterface;
use App\Domain\Post\Entity\Post;

/**
 * Simple service that creates new element Blog.
 */
final class CreateElementService
{
    public function __construct(
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function create(string $username, string $text): Post
    {
        $element = new Post($username, $text);
        $this->em->persist($element)->run();

        return $element;
    }
}
