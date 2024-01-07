<?php

namespace App\Service\Filter;

class TestDateFilter extends AbstractBetweenFilter
{
    protected static function getFilterName(): string
    {
        return 'testDate';
    }

    protected static function needQuoteValues(): bool
    {
        return true;
    }
}
