<?php

namespace App\Repository;

use App\Entity\LieuxDeVie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LieuxDeVie|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuxDeVie|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuxDeVie[]    findAll()
 * @method LieuxDeVie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuxDeVieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LieuxDeVie::class);
    }

    // /**
    //  * @return LieuxDeVie[] Returns an array of LieuxDeVie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LieuxDeVie
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
