<?php

namespace App\Service;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;

class UsersService implements ServiceInterface
{
    public function __construct(
        private readonly UsersRepository $usersRepository,
        private readonly EntityManagerInterface $em
        )
    {
    }

    public function create(Object $object)
    {
        //tester si l'objet existe
        if (!$this->usersRepository->findOneBy(["email"=> $object->getEmail()])) {
            $this->em->persist($object);
            $this->em->flush();
        }
        else{
            throw new \Exception("Le compte existe deja");
        }
    }
    public function update(Object $object)
    {
        if($this->usersRepository->findOneBy(["email"=> $object->getEmail()])) {
            $this->em->persist($object);
            $this->em->flush();
        }
        else{
            throw new \Exception("Le compte n'existe pas");
        }
    }
    public function delete(int $id)
    {
        $user = $this->usersRepository->find($id);
        if($user) {
            $this->em->remove($user);
            $this->em->flush();
        }
        else {
            throw new \Exception("Le compte n'existe pas");
        }
    }
    public function findOneBy(int $id):Object
    {
        return $this->usersRepository->find($id)??throw new \Exception('Le compte n\'existe pas');
    }
    public function findAll(): array
    {
        return $this->usersRepository->findAll()??throw new \Exception('Il n\'y a pas de compte en BDD');
    }
    public function findByEmail(string $email) :User {
        return $this->usersRepository->findOneBy(["email"=>$email]);
    }
}
