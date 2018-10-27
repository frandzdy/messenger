<?php

namespace App\Entity\Repository;

use Doctrine\ORM\Query;

/**
 * AdvertRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function getAdvertWithCategories($id)
    {
        $qb = $this->createQueryBuilder('a')->join('a.commentaires', 'commentaires')->addSelect('commentaires')
            ->where("a.id = :id");
        $qb->setParameter("id", $id);

        return $qb->getQuery()->getSingleResult();
    }

    /**
     * @param $search
     * @return array
     */
    public function getSearch($search)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->where($qb->expr()->like("a.title", ':s'));
        $qb->setParameter("s", "%" . $search . "%");
        return $qb->getQuery()->getResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findPostUser($critera, $offset = 0, $limit = 5)
    {
        $qb = $this->createQueryBuilder('a');
        $critera['sexeIds'] = array();
        foreach ($critera['preferenceSexes'] as $preferenceSex){
            $critera['sexeIds'][] = $preferenceSex->getId();
        }
        $qb
            ->join('a.image', 'i')
            ->addSelect('i')
//            ->join('a.commentaires', 'c')
//            ->addSelect('c')
            ->leftJoin('a.author','author')
            ->addSelect('author')
            ->where($qb->expr()->eq("a.author", ':id'))
//            ->orWhere($qb->expr()->eq("author.preferenceDepartements", ':preferenceDepartements'))
            //->andWhere($qb->expr()->in("author.preferenceSexes", ':preferencesSexe'))
            ->setParameter("id", $critera['id'])
            //->setParameter("preferencesSexe", $critera['sexeIds'])
            //->setParameter("preferencesDepartement", 95)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('a.createdAt', 'DESC');

        return $qb->getQuery()->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true)->getResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findPostUserScroll($id, $offset = 0, $limit = 5)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->leftJoin('a.image', 'i')
            ->addSelect('i')
            ->where($qb->expr()->like("a.author", ':id'))
            ->setParameter("id", $id)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('a.createdAt', 'DESC');

        return $qb->getQuery()->getResult();
    }
}
