<?php
declare(strict_types=1);

namespace App\Endpoint\Web\Post;

use App\Domain\Post\Entity\Post;
use App\Domain\Post\Repository\PostRepositoryInterface;
use App\Domain\Post\Service\PostService;
use App\Endpoint\Web\Filter\PostFilter;
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
        $posts = $this->repository->getAll();
        return $this->views->render('post/index', compact('posts'));
    }

    #[Route(route: '/post/<id:int>', name: 'post.show')]
    public function show($id): string
    {
        $post = $this->repository->getById((int)$id);
        return $this->views->render('post/show', compact('post'));
    }

    #[Route(route: '/api/post/create', name: 'post.store', methods: ['POST'])]
    public function store(PostFilter $filter, PostService $service)
    {
        try {
            $post = $service->create($filter->title, $filter->text);
            return [
                'success' => true,
                'title' => $post->getTitle(),
                'text' => $post->getText(),
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'error' => 'При выполении запроса произошла ошибка',
                'message' => $e->getMessage()
            ];
        }
    }

    #[Route(route: '/api/post/update/<id:int>', name: 'post.update', methods: ['PATCH'])]
    public function update($id, PostFilter $filter, PostService $service)
    {
        try {
            $post = $service->update((int)$id, $filter->title, $filter->text);
            return [
                'success' => true,
                'title' => $post->getTitle(),
                'text' => $post->getText(),
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'error' => 'При выполении запроса произошла ошибка',
                'message' => $e->getMessage()
            ];
        }
    }

    #[Route(route: '/api/post/delete/<id:int>', name: 'post.delete', methods: ['DELETE'])]
    public function delete($id, PostService $service)
    {
        try {
           $service->delete((int)$id);
            return [
                'success' => true,
            ];
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'error' => 'При выполении запроса произошла ошибка',
                'message' => $e->getMessage()
            ];
        }
    }
}
