<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

class ActualizeAtFilter extends AbstractFilter
{
    protected static function getFilterName(): string
    {
        return 'actualizeAt';
    }

    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $date = $this->prepareValue($value);
        $queryBuilder->andWhere($queryBuilder->expr()->between('cadastre.actualizeAt', '\''.$date[0].'\'', '\''.$date[1].'\''));
    }

    protected function prepareValue(mixed $value): array
    {
        if ($value[0] > $value[1]) {
            return [$value[1], $value[0]];
        }

        return [$value[0], $value[1]];
    }
}
