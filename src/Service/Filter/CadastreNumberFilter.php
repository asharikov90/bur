<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class CadastreNumberFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'cadastreNumber';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->in('cadastre.cadastreNumber', $this->prepareValue($value)));
    }
}
