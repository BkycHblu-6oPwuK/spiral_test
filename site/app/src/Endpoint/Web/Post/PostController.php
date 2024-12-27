<?php
declare(strict_types=1);

namespace App\Endpoint\Web\Post;

use App\Domain\Post\Entity\Post;
use App\Domain\Post\Repository\PostRepositoryInterface;
use Cycle\ORM\ORMInterface;
use Spiral\Prototype\Traits\PrototypeTrait;
use Spiral\Router\Annotation\Route;

/**
 * Simple home page controller. It renders home page template and also provides
 * an example of exception page.
 */
final class PostController
{
    /**
     * Read more about Prototyping:
     * @link https://spiral.dev/docs/basics-prototype/#installation
     */
    
    use PrototypeTrait;

    private PostRepositoryInterface $repository;

    public function __construct(
        ORMInterface $orm
    )
    {
        $this->repository = $orm->getRepository(Post::class);
    }


    #[Route(route: '/post', name: 'post.index')]
    public function index(): string
    {
        dd($this->repository->getAll());
        return $this->views->render('post/index');
    }

    #[Route(route: '/api/post/create', name: 'post.store', methods: ['POST'])]
    public function store()
    {
        dd($this->request->data->all());
    }
}
