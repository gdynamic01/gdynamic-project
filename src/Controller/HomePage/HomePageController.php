<?php

namespace App\Controller\HomePage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home/accueil", name="home_page")
     */
    public function homePage()
    {
        return $this->render('home_page/home-page.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
