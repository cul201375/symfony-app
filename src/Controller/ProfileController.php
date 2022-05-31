<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class ProfileController extends AbstractController {

    /**
     * @Route("/profile", name="app_get_user_profile", methods={"GET"})
     */
    function getUserProfile(UserRepository $userRepository, Request $request):Response{
        //$user = $this->$request->request->getUser();
        $respose = array("code"=>200,"html"=>$this->render('home/settings/user_settings.html.twig')->getContent());
        return new JsonResponse($respose);
    }

    /**
     * @Route("/profile", name="app_post_user_profile", methods={"POST"})
     */
    function settUserProfile():Response{
        $userObject = ['name'=>'emanuel', 'email'=>'correo'];
        return new JsonResponse($userObject);
    }
}
?>