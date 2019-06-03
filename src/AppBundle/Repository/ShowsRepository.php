<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 14:38
 */

namespace AppBundle\Repository;


use AppBundle\Entity\ShowEntity;
use Doctrine\ORM\EntityRepository;

class ShowsRepository extends EntityRepository
{
    public function findByMostRecent()
    {
        $qb = $this->_em->createQueryBuilder();

        return $qb->select('s')
            ->from(ShowEntity::class, 's')
            ->orderBy('s.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

}