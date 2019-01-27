<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationUserFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationUserController extends AbstractController
{
    /**
     * @Route("/creation/compte", name="registration_user")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationUserFormType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            // Encode the password
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles($user->getRoles());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirect page confirmation et envoie email d'activation compte
            return $this->render(
                'confirmation/creation-compte.html.twig', [
                    'email' => $user->getEmail()
                ]);
            
        }

        if(!is_null($this->getUser())){
            return $this->redirectToRoute('home_page');
        }
        
        return $this->render(
            'registration_user/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'RegistrationUserController',
        ]);
    }
}
