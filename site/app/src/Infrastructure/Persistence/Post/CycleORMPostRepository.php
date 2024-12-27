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
    public function getAll() : array
    {
        return $this->findAll();
    }
    
    public function getById(int $id): Post
    {
        $user = $this->findByPK($id);

        if ($user === null) {
            throw new PostNotFoundException();
        }

        return $user;
    }
}
