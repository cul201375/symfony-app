<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController{

    #[Route('/home', name: 'app_home', methods: 'GET')]
    public function home() : Response
    {
        $user = $this->getUser();
        if ($user != null) {
            // $response = $generateClient->request(
            //     'GET',
            //     'https://pokeapi.co/api/v2/pokemon?limit=100&offset=0'
            // );
    
            // , ['data' => $content]
            
            // $statusCode = $response->getStatusCode();
            // $contentType = $response->getHeaders()['content-type'][0];
            // $content = $response->getContent();
            // $content = $response->toArray();
            return $this->render('home/home.html.twig');
        }
        else{
            return $this->redirect('/');
        }
    }
}


?>