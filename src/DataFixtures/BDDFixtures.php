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

        $categorie1 = new Categorie ();

        $categorie1 -> setLibelle ("Entrée");
        $categorie1 -> setImage ("Entree_cat.jpg");
        $categorie1 -> setActive (1);

        $manager -> persist ($categorie1);
        $manager -> flush ();


        $categorie2 = new Categorie ();

        $categorie2 -> setLibelle ("Desserts");
        $categorie2 -> setImage ("Dessert_cat.jpg");
        $categorie2 -> setActive (1);

        $manager -> persist ($categorie2);
        $manager -> flush ();


        $categorie3 = new Categorie ();

        $categorie3 -> setLibelle ("Boissons");
        $categorie3 -> setImage ("Boissons_cat.jpg");
        $categorie3 -> setActive (1);

        $manager -> persist ($categorie3);
        $manager -> flush ();


        $plat1 = new Plat();

        $plat1 -> setCategorie ($categorie1);
        $plat1 -> setLibelle("Soupe à l'Oignon Gratinee");
        $plat1 -> setDescription ("Une soupe française traditionnelle préparée à base d'oignons caramélisés, de bouillon de bœuf, de vin blanc et d'herbes, garnie de croûtons de pain grillés et de fromage gratiné.");
        $plat1 -> setPrix(5);
        $plat1 -> setImage ("SoupeOignon.jpeg");
        $plat1 -> setActive (1);

        $manager -> persist ($plat1);
        $manager -> flush ();


        $plat2 = new Plat();

        $plat2 -> setCategorie ($categorie1);
        $plat2 -> setLibelle("Bruschetta");
        $plat2 -> setDescription ("Une entrée italienne classique composée de tranches de pain grillées frottées à l'ail et garnies de tomates fraîches coupées en dés, de basilic frais, d'huile d'olive et de sel.");
        $plat2 -> setPrix(6);
        $plat2 -> setImage ("Bruschetta.jpg");
        $plat2 -> setActive (1);

        $manager -> persist ($plat2);
        $manager -> flush ();


        $plat3 = new Plat();

        $plat3 -> setCategorie ($categorie1);
        $plat3 -> setLibelle("Hummus et Pita");
        $plat3 -> setDescription ("Un plat d'entrée populaire dans de nombreuses cuisines du Moyen-Orient et de la Méditerranée, consistant en une purée crémeuse de pois chiches, de tahini (pâte de sésame), d'ail, de jus de citron et d'huile d'olive, servi avec des pains pita chauds et moelleux pour tremper.");
        $plat3 -> setPrix(4);
        $plat3 -> setImage ("Hummus.jpg");
        $plat3 -> setActive (1);

        $manager -> persist ($plat3);
        $manager -> flush ();


        $plat4 = new Plat();

        $plat4 -> setCategorie ($categorie2);
        $plat4 -> setLibelle ("Brownie");
        $plat4 -> setDescription (" Un délicieux dessert américain connu pour sa texture dense et moelleuse, ainsi que son intense saveur de chocolat. Le brownie est préparé en mélangeant du chocolat fondu avec du beurre, du sucre, des œufs, de la farine et parfois des noix ou des pépites de chocolat, puis en cuisant le mélange dans un moule carré jusqu'à ce qu'il soit légèrement croquant à l'extérieur mais encore humide à l'intérieur.");
        $plat4 -> setPrix(4.5);
        $plat4 -> setImage ("Brownie.jpg");
        $plat4 -> setActive (1);

        $manager -> persist ($plat4);   
        $manager -> flush ();   


        $plat5 = new Plat();

        $plat5 -> setCategorie ($categorie2);
        $plat5 -> setLibelle ("Flan");
        $plat5 -> setDescription ("Un dessert français traditionnel, le flan pâtissier est un gâteau composé d'une pâte brisée ou feuilletée recouverte d'une crème à base d'œufs, de lait, de sucre, de farine et d'extrait de vanille. Contrairement au flan traditionnel, le flan pâtissier est cuit au four jusqu'à ce que la garniture se solidifie pour former une texture ferme et crémeuse.");
        $plat5 -> setPrix (3.5);
        $plat5 -> setImage ("Flan.jpg");
        $plat5 -> setActive (1);

        $manager -> persist ($plat5);
        $manager -> flush ();


        $plat6 = new Plat();

        $plat6 -> setCategorie ($categorie2);
        $plat6 -> setLibelle ("Mille-feuille");
        $plat6 -> setDescription (" Un dessert emblématique de la pâtisserie française, le mille-feuille, également connu sous le nom de Napoleon, est composé de fines couches de pâte feuilletée croustillante alternant avec des couches de crème pâtissière légère et parfumée à la vanille. Le dessus du mille-feuille est souvent décoré de glaçage royal ou de sucre glace, créant une présentation élégante et raffinée.");
        $plat6 -> setPrix(4.5);
        $plat6 -> setImage ("MilleFeuille.jpg");
        $plat6 -> setActive (1);

        $manager -> persist ($plat6);   
        $manager -> flush ();  


        $plat7 = new Plat();

        $plat7 -> setCategorie ($categorie3);
        $plat7 -> setLibelle ("Ice Tea");
        $plat7 -> setDescription ("Rafraîchissant et désaltérant, cet élixir glacé allie la fraîcheur du thé infusé aux notes subtiles de citron, offrant une expérience rafraîchissante inégalée.");
        $plat7 -> setPrix (1.5);
        $plat7 -> setImage ("ice-tea.jpg");
        $plat7 -> setActive (1);

        $manager -> persist ($plat7);
        $manager -> flush ();


        $plat8 = new Plat();

        $plat8 -> setCategorie ($categorie3);
        $plat8 -> setLibelle ("Coca-Cola");
        $plat8 -> setDescription ("Une boisson pétillante et rafraîchissante, symbole de convivialité, offrant une explosion de saveurs sucrées et acidulées qui éveillent les papilles à chaque gorgée.");
        $plat8 -> setImage ("coca.jpeg");
        $plat8 -> setPrix (1.5);
        $plat8 -> setActive (1);
                
        $manager -> persist ($plat8);
        $manager -> flush ();


        $user1 = new User();
        $user1 -> setEmail("Rambo@gmail.com");
        $user1 -> setRoles(["ROLE_USER"]);
        $user1 -> setPassword("mdp");
        $user1 -> setNom("Rambo");
        $user1 -> setPrenom("John");
        $user1 -> setTelephone("0651114400");
        $user1 -> setAdresse("30 rue de Poulainville");
        $user1 -> setCp("80000");
        $user1 -> setVille("Amiens");

        $manager -> persist( $user1 );
        $manager -> flush ();

        $user2 = new User();
        $user2 -> setEmail("Sacquet@gmail.com");
        $user2 -> setRoles(["ROLE_USER"]);
        $user2 -> setPassword("mdp");
        $user2 -> setNom("Sacquet");
        $user2 -> setPrenom("Bilbon");
        $user2 -> setTelephone("0614744440");
        $user2 -> setAdresse("330 Avenue du Général Leclercq");
        $user2 -> setCp("80000");
        $user2 -> setVille("Amiens");

        $manager -> persist( $user2 );
        $manager -> flush ();


        $commande1 = new Commande();
        $dateCommande1 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:38:45");
        $commande1 -> setDateCommande($dateCommande1);
        $commande1 -> setTotal(0);
        $commande1 -> setEtat("0");
        $commande1 -> setUser($user1);
        $manager -> persist( $commande1 );
        $manager -> flush ();   

        $commande2 = new Commande();
        $dateCommande2 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:40:22");
        $commande2 -> setDateCommande($dateCommande2);
        $commande2 -> setTotal(0);
        $commande2 -> setEtat("2");
        $commande2 -> setUser($user2);
        $manager -> persist( $commande2 );
        $manager -> flush ();   

        $commande3 = new Commande();
        $dateCommande3 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:42:16");
        $commande3 -> setDateCommande($dateCommande3);
        $commande3 -> setTotal(0);
        $commande3 -> setEtat("3");
        $commande3 -> setUser($user2);
        $manager -> persist( $commande3 );
        $manager -> flush ();   
    }
}
