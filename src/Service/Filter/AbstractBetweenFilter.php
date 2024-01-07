<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractBetweenFilter extends AbstractFilter
{
    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void
    {
        $value = $this->prepareValue($value);
        $queryBuilder->andWhere($queryBuilder->expr()->between(
            static::FIELD_PREFIX.'.'.static::getFieldName(),
            static::needQuoteValues() ? '\''.$value[0].'\'' : $value[0],
            static::needQuoteValues() ? '\''.$value[1].'\'' : $value[1],
        ));
    }

    protected static function needQuoteValues(): bool
    {
        return false;
    }

    protected function prepareValue(mixed $value): array
    {
        if ($value[0] > $value[1]) {
            return [$value[1], $value[0]];
        }

        return [$value[0], $value[1]];
    }
}
