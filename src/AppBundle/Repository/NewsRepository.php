<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 11:06
 */

namespace AppBundle\Repository;

use AppBundle\Entity\NewsEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class NewsRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, NewsEntity::class);
        $this->manager = $manager;
    }

    public function findByMostRecent()
    {
        $qb = $this->manager->createQueryBuilder();

        return $qb->select('n')
            ->from(NewsEntity::class, 'n')
            ->orderBy('n.createAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}