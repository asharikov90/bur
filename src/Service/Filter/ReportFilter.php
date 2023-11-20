<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class ReportFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'report';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $queryBuilder->andWhere($queryBuilder->expr()->like('cadastre.report', '\'%'.$value.'%\''));
    }
}
