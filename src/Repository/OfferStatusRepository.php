<?php

namespace App\Repository;

use App\Entity\OfferStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfferStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfferStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfferStatus[]    findAll()
 * @method OfferStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfferStatus::class);
    }


    public function findByExampleField($value): ?OfferStatus
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.offer_status = :Open')
            ->setParameter('Open', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?OfferStatus
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
