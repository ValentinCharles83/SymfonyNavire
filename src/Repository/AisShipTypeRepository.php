<?php

namespace App\Repository;

use App\Entity\AisShipType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AisShipType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AisShipType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AisShipType[]    findAll()
 * @method AisShipType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AisShipTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AisShipType::class);
    }

    // /**
    //  * @return AisShipType[] Returns an array of AisShipType objects
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
    public function findOneBySomeField($value): ?AisShipType
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
