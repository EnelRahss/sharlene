<?php

namespace App\Service;

use App\Entity\Followup;
use App\Repository\FollowupRepository;
use Doctrine\ORM\EntityManagerInterface;

class FollowupService implements ServiceInterface{
    public function __construct(
        private readonly FollowupRepository $repo,
        private readonly EntityManagerInterface $em
        )
    {
    }
    public function create(Object $object){
        $this->em->persist($object);
        $this->em->flush();
    }
    public function update(Object $objet){}
    public function delete(int $id){}
    public function findOneBy(int  $id):Object{}
    public function findAll():array{}
}
