<?php
declare(strict_types=1);

namespace App\Endpoint\Web\Post;

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


    #[Route(route: '/post', name: 'post.index')]
    public function index(): string
    {
        return $this->views->render('post/index');
    }

    #[Route(route: '/api/post/create', name: 'post.store', methods: ['POST'])]
    public function store()
    {
        dd($this->request->data->all());
    }
}
