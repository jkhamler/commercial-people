<?php

namespace App\Repository;

use App\Entity\LeagueTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LeagueTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeagueTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeagueTeam[]    findAll()
 * @method LeagueTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeagueTeamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LeagueTeam::class);
    }

//    /**
//     * @return LeagueTeam[] Returns an array of LeagueTeam objects
//     */
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
    public function findOneBySomeField($value): ?LeagueTeam
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
