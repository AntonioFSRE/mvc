<?php

namespace App\Repository;

use App\Entity\ProductStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductStatus[]    findAll()
 * @method ProductStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductStatus::class);
    }


    /*
    public function findOneBySomeField($value): ?JobApplications
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
