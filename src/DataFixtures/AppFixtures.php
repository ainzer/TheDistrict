<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Utilisateur;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

$categorie1 = new Categorie();
$categorie1->setLibelle('Burger');
$categorie1->setImage('Img/food/burgercat.jpg');
$categorie1->setActive('Yes');
$manager->persist($categorie1);


// Exécuter les opérations de persist
$manager->flush();
    }
}
