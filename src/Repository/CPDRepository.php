<?php

namespace App\Repository;

use App\Entity\CPD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CPD|null find($id, $lockMode = null, $lockVersion = null)
 * @method CPD|null findOneBy(array $criteria, array $orderBy = null)
 * @method CPD[]    findAll()
 * @method CPD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CPDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CPD::class);
    }

    // /**
    //  * @return CPD[] Returns an array of CPD objects
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
    public function findOneBySomeField($value): ?CPD
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
