<?php

declare(strict_types=1);

namespace App\Domain\Post\Service;

use Cycle\ORM\EntityManagerInterface;
use App\Domain\Post\Entity\Post;
use Cycle\ORM\ORMInterface;

final class PostService
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly ORMInterface $orm
    ) {}

    public function create(string $title, string $text): Post
    {
        $post = new Post($title, $text);
        $this->em->persist($post)->run();

        return $post;
    }

    public function update(int $id, string $title, string $text): Post
    {
        $post = $this->orm->getRepository(Post::class)->getById($id);
        $post->setTitle($title);
        $post->setText($text);
        $this->em->persist($post)->run();
        return $post;
    }

    public function delete(int $id) : void
    {
        $post = $this->orm->getRepository(Post::class)->getById($id);
        $this->em->delete($post)->run();
    }
}
