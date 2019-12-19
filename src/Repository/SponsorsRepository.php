<?php

namespace App\Repository;

use App\Entity\Sponsors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class SponsorsRepository
 * @package App\Repository
 * @method Sponsors[] findAll()
 */
class SponsorsRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Sponsors::class);
	}
}