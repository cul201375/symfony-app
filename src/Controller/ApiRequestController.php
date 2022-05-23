<?php
namespace App\Controller;

use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiRequestController extends AbstractController {

    //GET POKEMOS ENDPOINT
    #[Route('/api/v1/pokemons/{pokemon}', name: 'api_get_pokemon', methods: 'GET')]
    public function pokemon($pokemon = null, HttpClientInterface $generateClient) : Response
    {

        $response = new Response();
        $validUser = $this -> getUser();
        if(!$validUser){
            return new Response('acceso denegado, porfavor autenticate.');
        }
        if ($pokemon) { 
            $response = $generateClient->request(
                'GET',
                'https://pokeapi.co/api/v2/pokemon/'.$pokemon
            );
    
            $statusCode = $response->getStatusCode();
            $contentType = $response->getHeaders()['content-type'][0];
            $content = $response->getContent();
            $content = $response->toArray();
    
            return new JsonResponse($content);
        } 
        else{
            $response = $generateClient->request(
                'GET',
                'https://pokeapi.co/api/v2/pokemon?limit=10&offset=0'
            );
    
            $statusCode = $response->getStatusCode();
            $contentType = $response->getHeaders()['content-type'][0];
            $content = $response->getContent();
            $content = $response->toArray();
    
            return new JsonResponse($content);
        }
    }
}
?>