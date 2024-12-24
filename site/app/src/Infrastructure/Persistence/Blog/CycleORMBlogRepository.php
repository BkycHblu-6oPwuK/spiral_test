<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Blog;

use Cycle\ORM\Select\Repository;
use App\Domain\Blog\Entity\Element;
use App\Domain\Blog\Exception\ElementNotFoundException;
use App\Domain\Blog\Repository\BlogRepositoryInterface;

/**
 * @template TElement of Element
 * @extends Repository<TElement>
 */
final class CycleORMBlogRepository extends Repository implements BlogRepositoryInterface
{
    public function getById(int $id): Element
    {
        $user = $this->findByPK($id);

        if ($user === null) {
            throw new ElementNotFoundException();
        }

        return $user;
    }
}
