<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 14:38
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Show;
use Doctrine\ORM\EntityRepository;

class ShowsRepository extends EntityRepository
{
    public function findByMostRecent()
    {
        $qb = $this->_em->createQueryBuilder();

        return $qb->select('s')
            ->from(Show::class, 's')
            ->orderBy('s.date', 'DESC')
            ->getQuery()
            ->getResult();
    }

}