<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class DrillingStartFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'drillingStart';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->eq('cadastre.drillingStart', $value));
    }
}
