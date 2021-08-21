<?php

namespace App\Repository;

use App\Entity\BACK\Medicine;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Medicine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicine[]    findAll()
 * @method Medicine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medicine::class);
    }

    public function findMedicinesByName(String $name): Array
    {
        return $this->createQueryBuilder('Medicine')
                    ->andWhere('Medicine.name LIKE :name OR Medicine.medic_compo LIKE :name')
                    ->setParameter('name', '%' . $name . '%')
                    ->setMaxResults(20)
                    ->getQuery()
                    ->execute();
    }

    // /**
    //  * @return Medicine[] Returns an array of Medicine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medicine
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
