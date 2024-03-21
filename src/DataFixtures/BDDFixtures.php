<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Categorie;
use App\Entity\Detail;
use App\Entity\Commande;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BDDFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $categorie1 = new Categorie();

        $categorie1->setLibelle("Pizza");
        $categorie1->setImage("pizza_cat.jpg");
        $categorie1->setActive(1);

        $manager->persist($categorie1);
        $manager->flush();


        $categorie2 = new Categorie();

        $categorie2->setLibelle("Burger");
        $categorie2->setImage("burger_cat.jpg");
        $categorie2->setActive(1);

        $manager->persist($categorie2);
        $manager->flush();


        $categorie3 = new Categorie();

        $categorie3->setLibelle("Wraps");
        $categorie3->setImage("wrap_cat.jpg");
        $categorie3->setActive(1);

        $manager->persist($categorie3);
        $manager->flush();


        $categorie4 = new Categorie();

        $categorie4->setLibelle("Pasta");
        $categorie4->setImage("pasta_cat.jng");
        $categorie4->setActive(1);

        $manager->persist($categorie4);
        $manager->flush();


        $categorie5 = new Categorie();

        $categorie5->setLibelle("Sandwich");
        $categorie5->setImage("sandwich_cat.jng");
        $categorie5->setActive(0);

        $manager->persist($categorie5);
        $manager->flush();


        $categorie6 = new Categorie();

        $categorie6->setLibelle("Asian Food");
        $categorie6->setImage("asian_food_cat.jng");
        $categorie6->setActive(0);

        $manager->persist($categorie6);
        $manager->flush();


        $categorie7 = new Categorie();

        $categorie7->setLibelle("Salade");
        $categorie7->setImage("salade_cat.jng");
        $categorie7->setActive(1);

        $manager->persist($categorie7);
        $manager->flush();


        $categorie8 = new Categorie();

        $categorie8->setLibelle("Veggie");
        $categorie8->setImage("veggie_cat.jng");
        $categorie8->setActive(1);

        $manager->persist($categorie8);
        $manager->flush();

        $plat1 = new Plat();

        $plat1->setCategorie($categorie1);
        $plat1->setLibelle("Pizza Bianca");
        $plat1->setDescription("Une pizza fine et croustillante garnie de crème mascarpone légèrement citronnée et de tranches de saumon fumé, le tout relevé de baies roses et de basilic frais.");
        $plat1->setPrix(14);
        $plat1->setImage("pizza-salmon.png");
        $plat1->setActive(1);

        $manager->persist($plat1);
        $manager->flush();


        $plat2 = new Plat();

        $plat2->setCategorie($categorie1);
        $plat2->setLibelle("Pizza Margherita");
        $plat2->setDescription("Une authentique pizza margarita, un classique de la cuisine italienne! Une pâte faite maison, une sauce tomate fraîche, de la mozzarella Fior di latte, du basilic, origan, ail, sucre, sel & poivre...");
        $plat2->setPrix(14);
        $plat2->setImage("pizza-margherita.jpg");
        $plat2->setActive(1);

        $manager->persist($plat2);
        $manager->flush();


        $plat3 = new Plat();

        $plat3->setCategorie($categorie2);
        $plat3->setLibelle("District Burger");
        $plat3->setDescription("Burger composé d'un bun's du boulanger, deux steacks de 80g (origine française), de deux tranches de poitrine de porc fumée, de deux tranches de cheddar affiné, salade et oignons confits.");
        $plat3->setPrix(8);
        $plat3->setImage("hamburger.jpg");
        $plat3->setActive(1);

        $manager->persist($plat3);
        $manager->flush();


        $plat4 = new Plat();

        $plat4->setCategorie($categorie2);
        $plat4->setLibelle("Cheeseburger");
        $plat4->setDescription("Burger composé d'un bun's du boulanger, de salade, oignons rouges, pickles, oignon confit, tomate, d'un steack d'origine Française, d'une tranche de cheddar affiné, et de notre sauce maison.");
        $plat4->setPrix(8);
        $plat4->setImage("cheesburger.jpg");
        $plat4->setActive(1);

        $manager->persist($plat4);
        $manager->flush();


        $plat5 = new Plat();

        $plat5->setCategorie($categorie3);
        $plat5->setLibelle("Buffalo Chicken Wrap");
        $plat5->setDescription("Du bon filet de poulet mariné dans notre spécialité sucrée & épicée, enveloppé dans une tortilla blanche douce faite maison.");
        $plat5->setPrix(5);
        $plat5->setImage("buffalo-chicken.webp");
        $plat5->setActive(1);

        $manager->persist($plat5);
        $manager->flush();


        $plat6 = new Plat();

        $plat6->setCategorie($categorie4);
        $plat6->setLibelle("Spaghetti aux légumes");
        $plat6->setDescription("Un plat7 de spaghetti au pesto de basilic et légumes poêlés, très parfumé et rapide.");
        $plat6->setPrix(10);
        $plat6->setImage("spaghetti-legumes.jpg");
        $plat6->setActive(1);

        $manager->persist($plat6);
        $manager->flush();


        $plat7 = new Plat();

        $plat7->setCategorie($categorie4);
        $plat7->setLibelle("Lasagnes");
        $plat7->setDescription("Découvrez notre recette des lasagnes, l'une des spécialités italiennes que tout le monde aime avec sa viande hachée et gratiné à l'emmental. Et bien sûr, une inoubliable béchamel à la noix de muscane.");
        $plat7->setPrix(12);
        $plat7->setImage("lasagnes_viande.jpg");
        $plat7->setActive(1);

        $manager->persist($plat7);
        $manager->flush();


        $plat8 = new Plat();

        $plat8 -> setCategorie ($categorie4);
        $plat8 -> setLibelle("Tagliatelles au saumon");
        $plat8 -> setDescription ("Découvrez notre recette délicieuse de tagliatelles au saumon frais et à la crème qui vous assure un véritable régal!");
        $plat8 -> setPrix(12);
        $plat8 -> setImage ("tagliatelles_saumon.webp");
        $plat8 -> setActive (1);

        $manager -> persist ($plat8);
        $manager -> flush ();


        $plat9 = new Plat();

        $plat9 -> setCategorie ($categorie7);
        $plat9 -> setLibelle("Salade César");
        $plat9 -> setDescription ("Une délicieuse salade Caesar (César) composée de filets de poulet grillés, de feuilles croquantes de salade romaine, de croutons à l'ail, de tomates cerise et surtout de sa fameuse sauce Caesar. Le tout agrémenté de copeaux de parmesan.");
        $plat9 -> setPrix(7);
        $plat9 -> setImage ("cesar_salad.jpg");
        $plat9 -> setActive (1);

        $manager -> persist ($plat9);
        $manager -> flush ();


        $plat10 = new Plat();

        $plat10 -> setCategorie ($categorie8);
        $plat10 -> setLibelle("Courgettes farcies au quinoa");
        $plat10 -> setDescription ("Voici une recette équilibrée à base de courgettes, quinoa et champignons, 100% vegan et sans gluten!");
        $plat10 -> setPrix(8);
        $plat10 -> setImage ("courgettes_farcies.jpg");
        $plat10 -> setActive (1);

        $manager -> persist ($plat10);
        $manager -> flush ();

    }
}
