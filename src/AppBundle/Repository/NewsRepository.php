<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 11:06
 */

namespace AppBundle\Repository;

use AppBundle\Entity\NewsEntity;
use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{

    public function findByMostRecent()
    {
        $qb = $this->_em->createQueryBuilder();

        return $qb->select('n')
            ->from(NewsEntity::class, 'n')
            ->orderBy('n.createAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}