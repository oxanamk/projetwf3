<?php

namespace App\Repository;

use App\Entity\Announces;
use App\Form\Type\FilterAnnounceType;
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

    public function accueilAnnonce()
    {
        $query = $this->getEntityManager()->createQuery("
            SELECT * FROM App\Entity\Announces LIMIT 3
        ");
        return $query->getResult();
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

    public function search($espece = null, $couleur = null, $statut = null, $caractere = null, $qualites=null,$lieux = null)
    {
        $query = $this->createQueryBuilder('a');

        if (!empty($espece)) {
            $query->leftjoin('a.espece', 'e');
            $query->andWhere('e.id = :id_espece')
                ->setParameter('id_espece', $espece);
        }
        if (!empty($couleur)) {
            $query->leftjoin('a.couleur', 'co');
            $query->andWhere('co.id = :id_couleur')
                ->setParameter('id_couleur', $couleur);
        }
        if (!empty($statut)) {
            $query->leftjoin('a.statut', 's');
            $query->andWhere('s.id = :id_statut')
                ->setParameter('id_statut', $statut);
        }
        if(!empty($caracteres)){
        $query->join('a.qualites', 'c');
        $query->select(array('a.qualites'));
        $query->where("a.qualites = " . $caractere->getId());
        $query->where("a.qualites= " . $caractere->getQuery()->getId());
    }
        // if (!empty($caractere)) {
        //     $query->leftjoin('a.qualites', 'c');
        //     $query->andWhere('c.id = :id_caractere')
        //         ->setParameter('id_caractere', $caractere);
        // }
        // if (!empty($lieux)) {
        //     $query->leftjoin('a.conditions_de_vie', 'cond');
        //     $query->andWhere('cond.id = :id_lieux')
        //         ->setParameter('id_lieux', $lieux);
        // }

      //  dd($query->getQuery()->getParameters());
        return $query->getQuery()->getResult();
    }

    public function countByDate()
    {
        $query = $this->getEntityManager()->createQuery("
            SELECT SUBSTRING(a.date, 1, 10) as date, COUNT(a) as count FROM App\Entity\Announces a GROUP BY date
        ");
        return $query->getResult();
    }

    /**
     * return Anounces[]
     */
    /*public function findSearch(array $form=null): array
    {
        $query = $this
            ->createQueryBuilder('a')
            ->select('a','e')
            ->join('a.espece', 'e')
            ->andWhere('e.id = :id');
        return $query->getQuery()->getResult();
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
