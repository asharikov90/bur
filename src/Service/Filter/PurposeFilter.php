<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class PurposeFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'purpose';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->in('purpose', $this->prepareValue($value)));
    }
}
