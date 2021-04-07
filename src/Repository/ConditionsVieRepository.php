<?php

namespace App\Repository;

use App\Entity\ConditionsVie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConditionsVie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConditionsVie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConditionsVie[]    findAll()
 * @method ConditionsVie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConditionsVieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConditionsVie::class);
    }

    // /**
    //  * @return ConditionsVie[] Returns an array of ConditionsVie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('cond')
            ->andWhere('cond.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('cond.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConditionsVie
    {
        return $this->createQueryBuilder('cond')
            ->andWhere('cond.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
