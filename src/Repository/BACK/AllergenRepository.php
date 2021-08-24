<?php

namespace App\Repository\BACK;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Allergen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allergen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allergen[]    findAll()
 * @method Allergen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllergenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allergen::class);
    }
    //SELECT * FROM `allergen`
    //INNER JOIN `allergen_medicine` ON `allergen`.`id` = `allergen_id`


    // SELECT * FROM `allergen_medicine`

    // INNER JOIN `allergen` ON `allergen_id` = `allergen`.`id` 
    // INNER JOIN `medicine` ON `medicine_id` = `medicine`.`id`

    // /**
    //  * @return Allergen[] Returns an array of Allergen objects
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
    public function findOneBySomeField($value): ?Allergen
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
