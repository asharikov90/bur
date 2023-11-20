<?php

namespace App\Controller;

use App\Controller\Request\ApiFilterRequest;
use App\Entity\Cadastre;
use App\Service\Filter\FilterFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/api')]
class CadastreApiController extends AbstractController
{
    #[Route(path: '/filter', name: 'app_cadastreapi_filter', methods: ['GET'])]
    public function filter(ApiFilterRequest $request, FilterFactory $filterFactory, EntityManagerInterface $entityManager): JsonResponse
    {
        $qb = $entityManager->getRepository(Cadastre::class)
            ->createQueryBuilder('cadastre')
            ->innerJoin('cadastre.district', 'district')
            ->innerJoin('cadastre.nomenclature', 'nomenclature')
            ->innerJoin('cadastre.purpose', 'purpose')
            ->setMaxResults($this->getParameter('max_result'))
            ->setFirstResult($request->start);

        foreach ($request->filters as $param => $value) {
            $filterFactory->get($param)->addCondition($qb, $value);
        }

        return new JsonResponse(['result' => $qb->getQuery()->getResult()]);
    }
}
