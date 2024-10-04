<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de la recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card border-0 shadow d-flex align-items-start">
            <div class="col-md-4 mb-4">
            <img src="{{ $recipeDetails['image'] }}" alt="{{ $recipeDetails['title'] }}" class="card-img-top">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $recipeDetails['title'] }}</h5>
                <p>Temps de cuisson : {{ $recipeDetails['readyInMinutes'] }} minutes</p>
                <p>Nombre de portions : {{ $recipeDetails['servings'] }}</p>
                <h6>Ingrédients :</h6>
                <ul>
                    @foreach($recipeDetails['extendedIngredients'] as $ingredient)
                        <li>{{ $ingredient['original'] }}</li>
                    @endforeach
                </ul>
                <h6>Instructions :</h6>
                <p>{{ $recipeDetails['instructions'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>
