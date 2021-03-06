<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CoursRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CoursRepository extends EntityRepository
{
    public function getByCours($id)
    {
        // La construction de la requête reste inchangée
        $query = $this->createQueryBuilder('cours')
            ->leftJoin('cours.contratEtude', 'cE')
            ->addSelect('cE')
            ->where('cE.id = :id')
            ->setParameter('id',$id)
            ->getQuery()->getResult();
        return $query;
    }
}
