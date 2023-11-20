<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class DrillingNumberFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'drillingNumber';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->like('cadastre.drillingNumber', '\''.$value.'%\''));
    }
}
