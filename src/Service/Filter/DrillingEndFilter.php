<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class DrillingEndFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'drillingEnd';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->eq('cadastre.drillingEnd', $value));
    }
}
