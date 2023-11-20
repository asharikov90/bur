<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class NomenclatureFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'nomenclature';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->in('nomenclature', $this->prepareValue($value)));
    }
}
