<?php

namespace App\Service\Filter;

class DepthFilter extends AbstractBetweenFilter
{
    protected static function getFilterName(): string
    {
        return 'depth';
    }
}
