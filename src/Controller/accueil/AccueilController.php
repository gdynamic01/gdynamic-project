<?php
    
namespace App\Controller\accueil;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        
        return $this->render(
            'accueil/accueil.html.twig', [
                'controller_name' => 'AccueilController',
            ]);
    }
}