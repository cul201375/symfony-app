<?php 
namespace App\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiGetPokemonController extends AbstractController
{
    #[Route('/api/v1/pokemon/{id}', name: 'api_get_pokemon', methods: 'GET')]
    public function getPokemons(int $id = null):JsonResponse
    {
        $ditto = ['id' => $id, 'name' => 'ditto'];
        if(!$id){
            return new JsonResponse('nulo');
        }
        return new JsonResponse($ditto);
    }

}


?>