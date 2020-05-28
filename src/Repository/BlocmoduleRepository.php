<?php

namespace App\Repository;

use App\Entity\Blocmodule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blocmodule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blocmodule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blocmodule[]    findAll()
 * @method Blocmodule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocmoduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blocmodule::class);
    }

    // /**
    //  * @return Blocmodule[] Returns an array of Blocmodule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Blocmodule
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
