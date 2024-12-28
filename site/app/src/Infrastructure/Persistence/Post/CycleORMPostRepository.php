<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Post;

use Cycle\ORM\Select\Repository;
use App\Domain\Post\Entity\Post;
use App\Domain\Post\Exception\PostNotFoundException;
use App\Domain\Post\Repository\PostRepositoryInterface;

/**
 * @template TPost of Post
 * @extends Repository<TPost>
 */
final class CycleORMPostRepository extends Repository implements PostRepositoryInterface
{
    /**
     * @return \App\Domain\Post\Entity\Post[]
     */
    public function getAll(): array
    {
        $posts = $this->findAll();
        return $posts;
    }

    public function getById(int $id): Post
    {
        $post = $this->findByPK($id);

        if ($post === null) {
            throw new PostNotFoundException();
        }

        return $post;
    }
}
