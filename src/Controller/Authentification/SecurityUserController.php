<?php

namespace App\Controller\Authentification;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityUserController extends AbstractController
{
    /**
     * @Route("/authentification", name="authentification_security_user")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

         // retrouver une erreur d'authentification s'il y en a une
         $error = $authenticationUtils->getLastAuthenticationError();
         // retrouver le dernier identifiant de connexion utilisé
         $lastUsername = $authenticationUtils->getLastUsername();
         
         if(!is_null($this->getUser())){
             return $this->redirectToRoute('home_page');
         }
         return $this->render('authentification/security_user/login.html.twig', [
             'last_username' => $lastUsername,
             'error' => $error,
             ]
         );

    }

    /**
     * @Route("/logout", name="security_logout")
    */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}
