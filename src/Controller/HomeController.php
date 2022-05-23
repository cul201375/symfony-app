<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomeController extends AbstractController{

    #[Route('/home', name: 'app_home', methods: 'GET')]
    public function home() : Response
    {
        $user = $this->getUser();
        if ($user != null) {
            return $this->render('home/home.html.twig');
        }
        else{
            return $this->redirect('/');
        }
    }
}


?>