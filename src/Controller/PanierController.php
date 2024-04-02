<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{

    #[Route('/panier/', name: 'app_panier')]
    public function index(SessionInterface $session, PlatRepository $platRepository)
    {

        $panier = $session->get('panier',[]);

        $data = [];
        $total = 0;

        foreach($panier as $id => $quantite){
            $plat = $platRepository->find($id);

            $data[] = [
                'plat' => $plat,
                'quantite' => $quantite
            ];
            $total += $plat->getPrix() * $quantite;
            
        }

        return $this->render('panier/index.html.twig', compact('data','total'));
    }


    #[Route('/panier/ajout/{id}', name: 'app_panierAjout')]
    public function PanierAjout(Plat $plat, SessionInterface $session)
    {

        $id = $plat->getId();

        $panier = $session->get('panier', []);

        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }

        $session -> set('panier', $panier);



        return $this->redirectToRoute('app_panier');
    }


    #[Route('/panier/retirer/{id}', name: 'app_panierRetirer')]
    public function PanierRetirer(Plat $plat, SessionInterface $session)
    {

        $id = $plat->getId();

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            if($panier[$id] > 1)
                $panier[$id]--;
            }else{
                unset($panier[$id]);
        }

        $session -> set('panier', $panier);


        return $this->redirectToRoute('app_panier');
    }


    #[Route('/panier/supprimer/{id}', name: 'app_panierSupprimer')]
    public function PanierSupprimer(Plat $plat, SessionInterface $session)
    {

        $id = $plat->getId();

        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        $session -> set('panier', $panier);



        return $this->redirectToRoute('app_panier');
    }

    #[Route('/panier/vider', name: 'app_panierVider')]
    public function PanierVider(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute('app_panier');
    }

}