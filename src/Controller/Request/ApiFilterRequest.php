<?php

namespace App\Controller\Request;

class ApiFilterRequest extends StartRequest
{
    public array $filters = [];

    public function setFilters(string $availableFilters): void
    {
        if (!$this->request->query->has('filters') || !is_array($this->request->query->all('filters'))) {
            return;
        }

        $this->filters = array_filter($this->request->query->all('filters'), function ($filterValue, $filterName) use ($availableFilters) {
            return in_array($filterName, explode(',', $availableFilters), true);
        }, ARRAY_FILTER_USE_BOTH);
    }
}
