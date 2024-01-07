<?php

namespace App\Service\Filter;

class BalanceFilter extends AbstractBetweenFilter
{
    protected static function getFilterName(): string
    {
        return 'balance';
    }
}
