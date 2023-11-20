<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class AddressFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'address';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->like('cadastre.address', '\'%'.$value.'%\''));
    }
}
