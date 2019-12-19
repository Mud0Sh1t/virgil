<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 11:06
 */

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * Class NewsRepository
 * @package App\Repository
 * @method News|null 	find($id, $lockMode = null, $lockVersion = null)
 * @method News| null 	findOneBy(array $criteria, array $orderBy = null)
 * @method News[] 		findAll()
 * @method News[] 		findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, News::class);
	}

	public function findByMostRecent()
    {
        $qb = $this->_em->createQueryBuilder();

        return $qb->select('n')
            ->from(News::class, 'n')
            ->orderBy('n.createAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}