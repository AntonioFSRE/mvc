<?php

namespace App\Repository;

use App\Entity\OfferApplications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method OfferApplications|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfferApplications|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfferApplications[]    findAll()
 * @method OfferApplications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferApplicationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfferApplications::class);
    }


    // /**
    //  * @return OfferApplications[] Returns an array of OfferApplications objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

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
