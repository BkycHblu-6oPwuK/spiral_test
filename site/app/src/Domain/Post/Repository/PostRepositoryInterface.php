<?php

declare(strict_types=1);

namespace App\Domain\Post\Repository;

use App\Domain\Post\Entity\Post;
use App\Domain\Post\Exception\PostNotFoundException;

interface PostRepositoryInterface
{
    public function getAll(): array;
    /**
     * @throws PostNotFoundException
     */
    public function getById(int $id): Post;
}
