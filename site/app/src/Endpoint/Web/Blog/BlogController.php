<?php
declare(strict_types=1);

namespace App\Endpoint\Web\Blog;

use Spiral\Prototype\Traits\PrototypeTrait;
use Spiral\Router\Annotation\Route;

/**
 * Simple home page controller. It renders home page template and also provides
 * an example of exception page.
 */
final class BlogController
{
    /**
     * Read more about Prototyping:
     * @link https://spiral.dev/docs/basics-prototype/#installation
     */
    use PrototypeTrait;


    #[Route(route: '/blog', name: 'blog.index')]
    public function index(): string
    {
        return $this->views->render('blog/index');
    }

    #[Route(route: '/blog/create', name: 'blog.store', methods: ['POST'])]
    public function store()
    {
        dd($this->request->data->all());
    }
}
