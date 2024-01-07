<?php

namespace App\Service\Filter;

class MouthFilter extends AbstractBetweenFilter
{
    protected static function getFilterName(): string
    {
        return 'mouth';
    }
}
