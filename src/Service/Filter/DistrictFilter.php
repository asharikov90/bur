<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class DistrictFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'district';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->in('district', $this->prepareValue($value)));
    }
}
