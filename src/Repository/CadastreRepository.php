<?php

namespace App\Repository;

use App\Entity\Cadastre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cadastre>
 *
 * @method Cadastre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cadastre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cadastre[]    findAll()
 * @method Cadastre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CadastreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cadastre::class);
    }
}
