<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Http;

class SpoonacularService
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.spoonacular.com/',
            'verify' => false, // Désactive la vérification SSL
        ]);
        $this->apiKey = env('SPOONACULAR_API_KEY'); // Assurez-vous que la clé API est dans votre fichier .env
    }

    public function getRecipes($query)
    {
        $response = Http::withOptions(['verify' => false])->get('https://api.spoonacular.com/recipes/complexSearch', [
            'apiKey' => $this->apiKey,
            'query' => $query,
            'number' => 100, // Limiter à 3 recettes
            'addRecipeInformation' => true // Ajoutez cette ligne pour obtenir des informations détaillées sur les recettes

        ]);

        if ($response->successful()) {
            return $response->json()['results'];
        }

        throw new Exception('Impossible de récupérer les recettes');
    }

    public function getRecipeById($id)
    {
        $response = Http::withOptions(['verify' => false])->get("https://api.spoonacular.com/recipes/{$id}/information", [
            'apiKey' => $this->apiKey,
        ]);

        if ($response->successful()) {

            return $response->json(); // Retourne les détails de la recette
        }

        throw new Exception('Unable to fetch recipe by ID');
    }

    public function searchRecipes($query)
    {
        $response = $this->client->request('GET', 'recipes/complexSearch', [
            'query' => [
                'apiKey' => $this->apiKey,
                'query' => $query,
                'number' => 10,
                'addRecipeInformation' => true,
                'language' => 'fr', // Ajouter ce paramètre pour obtenir les recettes en français
            ],
        ]);

        $recipes = json_decode($response->getBody(), true);

        return collect($recipes['results'])->map(function ($recipe) {
            return [
                'id' => $recipe['id'] ?? 'N/A',
                'title' => $recipe['title'] ?? 'Sans titre',
                'image' => $recipe['image'] ?? 'default-image.jpg',
                'readyInMinutes' => $recipe['readyInMinutes'] ?? 'Non spécifié', // Valeur par défaut si non présent
                'servings' => $recipe['servings'] ?? 'Non spécifié', // Valeur par défaut si non présent
            ];
        });
    }
}
