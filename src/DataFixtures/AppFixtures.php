<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Utilisateur;
use App\Entity\Detail;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        # ================================================================================ #
        #                                   CATEGORIE                                    #
        # ================================================================================ #

        


        // Exécuter les opérations de persist
        $manager->flush();
    }
}
