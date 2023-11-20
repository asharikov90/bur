<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class YearCadastreAddFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'yearCadastreAdd';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->in('cadastre.yearCadastreAdd', $this->prepareValue($value)));
    }
}
