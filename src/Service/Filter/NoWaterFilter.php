<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class NoWaterFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'noWater';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->eq('cadastre.noWater', $value));
    }
}
