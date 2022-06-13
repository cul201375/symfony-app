<?php 
namespace App\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiGetPokemonController extends AbstractController
{
    #[Route('/api/v1/pokemon/{id}', name: 'api_get_pokemon', methods: 'GET')]
    public function testPokemos(int $id = null):JsonResponse
    {
        $ditto = ['id' => $id, 'name' => 'ditto'];
        if(!$id){
            return new JsonResponse('nulo');
        }
        return new JsonResponse($ditto);
    }

    //GET POKEMOS ENDPOINT
    #[Route('/api/v1/pokemons/{pokemon}', name: 'app_api_v1_get_pokemon', methods: 'GET')]
    public function getPokemons($pokemon = null, HttpClientInterface $generateClient) : Response
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


    #POST POKEMONS ENDPOINT
    #[Route('/api/v1/pokemons/add/{pokemons}', name: 'app_api_v1_post_pokemons', methods: 'POST')]
    public function postPokemon($pokemons)
    {
        # code...
    }

}

?>