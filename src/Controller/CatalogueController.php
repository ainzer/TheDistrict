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
        $categorie = $this -> CategorieRepository -> findBy( ['active' => 1], null, 6);
        $plat = $this -> PlatRepository -> findBy( ['active' => 1], /*['quantité' => 'ASC']*/ null, 3);

        return $this->render('catalogue/index.html.twig', [

            'controller_name' => 'CatalogueController',
            'categorie'=> $categorie,
            'plat'=> $plat
        ]);
    }
}
