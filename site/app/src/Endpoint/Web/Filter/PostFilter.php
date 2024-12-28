<?php

declare(strict_types=1);

namespace App\Endpoint\Web\Filter;

use Spiral\Filters\Attribute\CastingErrorMessage;
use Spiral\Filters\Attribute\Input\Post;
use Spiral\Filters\Model\Filter;
use Spiral\Filters\Model\FilterDefinitionInterface;
use Spiral\Filters\Model\HasFilterDefinition;
use Spiral\Validator\FilterDefinition;

final class PostFilter extends Filter implements HasFilterDefinition
{
    #[Post(key: 'title')]
    #[CastingErrorMessage('Invalid type')]
    public string $title;

    #[Post(key: 'text')]
    #[CastingErrorMessage('Invalid type')]
    public string $text;

    public function filterDefinition(): FilterDefinitionInterface
    {
        return new FilterDefinition([
            'title' => ['string', 'required'],
            'text' => ['string', 'required'],
        ]);
    }
}
