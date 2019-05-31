<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 14:38
 */

namespace AppBundle\Repository;


use AppBundle\Entity\ShowEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class ShowsRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, ShowEntity::class);

        $this->manager = $manager;
    }

    public function findByMostRecent()
    {
        $qb = $this->manager->createQueryBuilder();

        return $qb->select('s')
            ->from(ShowEntity::class, 's')
            ->orderBy('s.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

}