<?php

namespace App\Repository;

use App\Entity\Announces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Announces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Announces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Announces[]    findAll()
 * @method Announces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnouncesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Announces::class);
    }

    public function findByUserAnnonce()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
            SELECT A  
            FROM announces
            JOIN users U ON U.id = A.user_id
    ');

        $userAnnonce = $query->getResult();
        return $userAnnonce;
    }

    public function search($espece = null, $couleur = null, $statut = null, $caractere = null)
    {
        $query = $this->createQueryBuilder('a');

        if ($espece != null) {
            $query->leftjoin('a.espece', 'e');
            $query->andWhere('e.id = :id')
                ->setParameter('id', $espece);
        }
        if ($couleur != null) {
            $query->leftjoin('a.couleur', 'co');
            $query->andWhere('co.id = :id')
                ->setParameter('id', $couleur);
        }
        if ($statut != null) {
            $query->leftjoin('a.statut', 's');
            $query->andWhere('s.id = :id')
                ->setParameter('id', $statut);
        }

       
        return $query->getQuery()->getResult();
    }

    public function countByDate()
    {
        $query = $this->getEntityManager()->createQuery("
            SELECT SUBSTRING(a.date, 1, 10) as date, COUNT(a) as count FROM App\Entity\Announces a GROUP BY date
        ");
        return $query->getResult();
    }


    // /**
    //  * @return Announces[] Returns an array of Announces objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Announces
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
