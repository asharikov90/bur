<?php

namespace App\Service\Filter;

use Doctrine\ORM\QueryBuilder;

interface FilterInterface
{
    public function addCondition(QueryBuilder $queryBuilder, mixed $value): void;

    public static function canCreate(string $name): bool;
}
