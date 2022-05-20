<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: 'GET')]
    public function register(): Response
    {
        return $this->render('registration/regis.html.twig');
    }
    #[Route('/register', name: 'app_register_val', methods:'POST')]
    public function validar(Request $request, 
    UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, 
    AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        if($request->getMethod() === 'POST' && $request->getPathInfo('app_register')){
            $user = new User();
            $user -> setEmail($request->request->get('email'));
            $user -> setPassword($userPasswordHasher->hashPassword($user, $request->request->get('password')));
            $user -> setPrimerNombre($request->request->get('primer_nombre'));
           // $user -> setEmail($request->request->get('email'));
            $entityManager->persist($user);
            $entityManager->flush();
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }
    }
}
