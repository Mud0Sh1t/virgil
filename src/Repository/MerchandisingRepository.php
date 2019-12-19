<?php

namespace App\Repository;

use App\Entity\Merchandising;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class MerchandisingRepository
 * @package App\Repository
 * @method Merchandising|null 	find($id, $lockMode = null, $lockVersion = null)
 * @method Merchandising|null 	findOneBy(array $criteria, array $orderBy = null)
 * @method Merchandising[] 		findAll()
 * @method Merchandising[] 		findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerchandisingRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Merchandising::class);
	}
}