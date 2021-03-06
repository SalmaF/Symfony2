<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UniversiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UniversiteRepository extends EntityRepository
{
    public function getByPays($id)
    {
        // La construction de la requête reste inchangée
        $query = $this->createQueryBuilder('universite')
            ->leftJoin('universite.ville', 'v')
            ->addSelect('v')
            ->leftJoin('v.pays', 'p')
            ->addSelect('p')
            ->where('p.id = :id')
            ->setParameter('id',$id)
            ->getQuery()->getResult();
        return $query;
    }

    
    
}
