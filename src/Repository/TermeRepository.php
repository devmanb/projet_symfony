<?php

namespace App\Repository;

use App\Entity\Terme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Terme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Terme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Terme[]    findAll()
 * @method Terme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Terme::class);
    }

    // /**
    //  * @return Terme[] Returns an array of Terme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Terme
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
