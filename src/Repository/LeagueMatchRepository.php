<?php

namespace App\Repository;

use App\Entity\LeagueMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LeagueMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeagueMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeagueMatch[]    findAll()
 * @method LeagueMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeagueMatchRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LeagueMatch::class);
    }

//    /**
//     * @return LeagueMatch[] Returns an array of LeagueMatch objects
//     */
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
    public function findOneBySomeField($value): ?LeagueMatch
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
