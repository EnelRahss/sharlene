<?php

namespace App\DataFixtures;
use App\Entity\User; 


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker; 

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Tableau vide qui va stocker les utilisateurs que je génère
        $users = [];
        //Boucle qui va itérer 10 utilisateurs factices
        for($i=0; $i<10; $i++){
        $user = new User();
        $user->setName(); 
        }

        $manager->flush();
    }
}
