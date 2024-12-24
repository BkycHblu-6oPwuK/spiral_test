<?php

declare(strict_types=1);

namespace App\Endpoint\Web\Filter;

use Spiral\Filters\Attribute\Input\Query;
use Spiral\Filters\Model\Filter;

final class PostFilter extends Filter
{
    #[Query(key: 'title')]
    public string $title;
}
