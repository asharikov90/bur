<?php

namespace App\Controller\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class StartRequest
{
    public int $start;

    protected Request $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->start = $this->request->query->get('start', 0);
    }
}
