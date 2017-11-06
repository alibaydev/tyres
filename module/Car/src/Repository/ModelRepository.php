<?php

namespace Car\Repository;

use Car\Entity\Model;
use Doctrine\ORM\EntityRepository;

class ModelRepository extends EntityRepository
{
    public function findByBrandId($brandId)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('model')
            ->from(Model::class, 'model')
            ->andWhere('IDENTITY(model.brand) = ?1')
            ->setParameter('1', $brandId)
            ->getQuery()
            ->getArrayResult();
    }
}