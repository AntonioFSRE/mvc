<?php

namespace App\Repository;

use App\Entity\ProductApplications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductApplications|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductApplications|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductApplications[]    findAll()
 * @method ProductApplications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductApplicationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductApplications::class);
    }


    public function findAllActive($expiresAt): array{
        $qb = $this->createQueryBuilder('p')
            ->where('p.expiresAt > :expiresAt')
            ->setParameter('expiresAt', $expiresAt)
            ->orderBy('p.expiresAt', 'ASC');

            $query = $qb->getQuery();

            return $query->execute();
    }
    /*{
        $entityManager = $this->getEntityManager();
        $now = new \DateTime();
        $query = $entityManager->createQuery(
            'SELECT p 
            FROM App\Entity\ProductApplications p
            WHERE p.expiresAt > :now
            ORDER BY p.expiresAt ASC'
        );
        return $query->getResult();
    }*/


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
