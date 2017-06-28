<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 27/06/2017
 * Time: 10:24
 */
class ProjectRepository extends EntityRepository
{
    public function findByCategoriesAndStatuses(array $categories = array(), array $statuses = array())
    {
        $qb = $this->createQueryBuilder('p');

        if (!empty($categories)) {
            $qb->andWhere($qb->expr()->in('p.category', $categories));
        }

        if (!empty($statuses)) {
            $qb->andWhere($qb->expr()->in('p.statut', $statuses));
        }

        return $qb->getQuery()->getResult();
    }
}