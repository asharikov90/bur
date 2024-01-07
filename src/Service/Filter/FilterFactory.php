<?php

namespace App\Service\Filter;

use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;

final class FilterFactory
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    /** @var FilterInterface[] */
    private const array FILTERS = [
        DistrictFilter::class,
        NomenclatureFilter::class,
        PurposeFilter::class,
        YearCadastreAddFilter::class,
        ActualizeAtFilter::class,
        CadastreNumberFilter::class,
        AddressFilter::class,
        DrillingNumberFilter::class,
        DrillingStartFilter::class,
        DrillingEndFilter::class,
        ReportFilter::class,
        DepthFilter::class,
        MouthFilter::class,
        BalanceFilter::class,
        TestDateFilter::class,
        NoWaterFilter::class,
    ];

    public function get(string $filterName): FilterInterface
    {
        foreach (self::FILTERS as $filter) {
            if ($filter::canCreate($filterName)) {
                return new $filter($this->entityManager);
            }
        }

        throw new InvalidArgumentException('Unknown filter name: '.$filterName);
    }
}
