<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{

    private $CategorieRepository;
    private $PlatRepository;

    public function __construct(CategorieRepository $CategorieRepository, PlatRepository $PlatRepository)
    {
        $this->CategorieRepository = $CategorieRepository;
        $this->PlatRepository = $PlatRepository;
    }

    #[Route('/', name: 'app_catalogue')]
    public function index(): Response
    {
        $categorie = $this -> CategorieRepository -> findBy ( ['active' => 1], null , 6);
        $platP = $this -> PlatRepository -> findBy ( ['active'=> 1], /*['quantité' => 'ASC']*/ null, 3);

        return $this->render('catalogue/index.html.twig', [
            
            'controller_name' => 'CatalogueController',
            'categorie'=> $categorie,
            'platP'=> $platP

        ]);
    }


    #[Route('/plats', name: 'app_plats')]
    public function ViewPlats(): Response
    {
        $categories=$this->CategorieRepository->findAll();
        $plats=$this->PlatRepository->findAll();

        return $this->render('/plats/index.html.twig', 
        
            [
                'controller_name' => 'PlatsController',

                'categorie'=> $categories,

                'plats'=> $plats
            ]
        );
    }


    #[Route('/categories', name: 'app_categories')]
    public function ViewCategorie(): Response
    {
        $categorie = $this -> CategorieRepository -> findAll ();

        return $this->render('/categorie/index.html.twig', 
        
            [
                'controller_name' => 'CategorieController',

                'categorie'=> $categorie,
            ]
        );
    }


    #[Route('/plats/{categorie_id}', name: 'app_platsC')]
    public function viewPlatsC($categorie_id): Response
    {

        $categorie = $this->CategorieRepository->find($categorie_id);
        
        $plats = $categorie->getPlats();
    
        return $this->render('/plat_categorie/index.html.twig', [
            'categorie' => $categorie,
            'plats' => $plats,
        ]);
    }
}