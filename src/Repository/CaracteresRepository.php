<?php

namespace App\Repository;

use App\Entity\Caracteres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Caracteres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Caracteres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Caracteres[]    findAll()
 * @method Caracteres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaracteresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Caracteres::class);
    }

    // /**
    //  * @return Caracteres[] Returns an array of Caracteres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Caracteres
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
