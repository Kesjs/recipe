<?php
namespace App\Http\Controllers;

use App\Services\SpoonacularService;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $spoonacularService;

    public function __construct(SpoonacularService $spoonacularService)
    {
        $this->spoonacularService = $spoonacularService;
    }

    public function index()
    {
        try {
            // Appel de l'API Spoonacular pour obtenir un certain nombre de recettes
            $recipes = $this->spoonacularService->getRecipes('pasta', 100); // Par exemple, 100 recettes
        } catch (\Exception $e) {
            return view('recipes.index')->withErrors(['message' => 'Impossible de récupérer les recettes']);
        }

        return view('recipes.index', compact('recipes'));
    }



    public function show($id)
    {
        // Utilisez le service Spoonacular pour obtenir les détails de la recette par ID
        $recipeDetails = $this->spoonacularService->getRecipeById($id);

        return view('recipes.show', compact('recipeDetails'));
    }

    public function getRecipes()
    {
        // Remplacez ceci par votre logique pour récupérer les recettes de l'API Spoonacular.
       // Essayez de récupérer les recettes à partir du cache
       $recipes = Cache::remember('recipes', 60, function () {
        return $this->fetchRecipesFromAPI(); // Votre fonction d'appel API
    });

    return $recipes;
    }

    public function getRecipesAsync($queries) {
        $promises = [];

        foreach ($queries as $query) {
            $promises[] = $this->client->getAsync("https://api.spoonacular.com/recipes/complexSearch", [
                'query' => [
                    'apiKey' => $this->apiKey,
                    'query' => $query,
                ]
            ]);
        }

        // Attendre que toutes les promesses soient résolues
        $responses = Promise\settle($promises)->wait();

        // Traiter les réponses
        $recipes = [];
        foreach ($responses as $response) {
            if ($response['state'] === 'fulfilled') {
                $recipes[] = json_decode($response['value']->getBody()->getContents());
            } else {
                // Gérer l'erreur
                // Vous pouvez logger l'erreur ou gérer l'exception
            }
        }

        return $recipes;
    }
}

