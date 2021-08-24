<?php

namespace App\Repository\BACK;

use App\Entity\BACK\ADMIN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ADMIN|null find($id, $lockMode = null, $lockVersion = null)
 * @method ADMIN|null findOneBy(array $criteria, array $orderBy = null)
 * @method ADMIN[]    findAll()
 * @method ADMIN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ADMINRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ADMIN::class);
    }

    // /**
    //  * @return ADMIN[] Returns an array of ADMIN objects
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
    public function findOneBySomeField($value): ?ADMIN
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
