<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 31/05/2019
 * Time: 14:38
 */

namespace App\Repository;

use App\Entity\Show;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ShowsRepository
 * @package App\Repository
 * @method Show|null 	find($id, $lockMode = null, $lockVersion = null)
 * @method Show|null 	findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method Show[] 		findAll()
 * @method Show[] 		findOneBy(array $criteria, array $orderBy = null)
 */
class ShowsRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry )
	{
		parent::__construct($registry, Show::class);
	}

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