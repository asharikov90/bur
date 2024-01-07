<?php

namespace App\Service\Filter;

class ActualizeAtFilter extends AbstractBetweenFilter
{
    protected static function getFilterName(): string
    {
        return 'actualizeAt';
    }

    protected static function needQuoteValues(): bool
    {
        return true;
    }
}
