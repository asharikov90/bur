<?php

namespace App\Service\Filter;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractFilter implements FilterInterface
{
    abstract protected static function getFilterName(): string;

    public function __construct(protected readonly EntityManagerInterface $entityManager)
    {
    }

    public static function canCreate(string $name): bool
    {
        return $name === static::getFilterName();
    }

    protected function prepareValue(mixed $value): array
    {
        return is_array($value) ? $value : [$value];
    }
}
