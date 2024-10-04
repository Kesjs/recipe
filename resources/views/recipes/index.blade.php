<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cooking Recipe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        body {
            background-image: url('dg.jpeg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        h2 {
            font-family: 'Kanit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }

        p {
            font-family: 'Space Grotesk', sans-serif;
        }

        .recipe-card {
            max-width: 350px;
            margin: 20px;
        }
        .recipe-card img {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }
        .ingredients, .steps {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="bg-white p-5 rounded shadow-lg min-vh-100 mb-5">

            <!-- Navigation Bar with Collapse -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="/">
                        <img src="logo.png" alt="Logo" width="80" height="65">
                    </a>

                    <!-- Collapse Button (Hamburger icon) -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collapsible Menu -->
                    <div class="collapse navbar-collapse " id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active bg-danger text-white px-2 rounded" href="#"  role="button"  aria-expanded="false">
                                    Nos diverses recettes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="actu">L'actu cuisine</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Search form -->
                    <form class="d-flex" role="search" action="{{ route('recipes.index') }}" method="GET">
                        <input class="form-control me-2" aria-label="Search" type="text" name="query" placeholder="Rechercher une recette">
                        <button type="submit" class="btn btn-outline-danger">Chercher</button>
                    </form>
                </div>
            </nav>

            <!-- Breadcrumb Section -->
            <nav style="background-color: #fff9db; margin-top: 20px" aria-label="breadcrumb" class="p-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nos diverses Recettes</li>
                </ol>
            </nav><br>
            <div class="row justify-content-center">
                @foreach($recipes as $recipe)
                    <div class="col-md-4 mb-4 d-flex justify-content-center">
                        <div class="card border-0 shadow" style="width: 20rem; height: 22rem; background-color: rgba(255, 255, 255, 0.8);">
                            <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body d-flex flex-column justify-content-between" style="height: calc(100% - 120px);"> <!-- Ajuster la hauteur de la carte pour le contenu -->
                                <h5 class="card-title text-center" style="font-size: 1.1rem;">{{ $recipe['title'] }}</h5>
                                <div class="text-center my-2" style="font-size: 0.9rem;">
                                    <span class="text-danger">{{ isset($recipe['spoonacularScore']) ? $recipe['spoonacularScore'] / 20 : 'N/A' }}</span> <!-- Note entre 0 et 5 -->
                                    <span class="text-danger">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-around" style="font-size: 0.85rem;">
                                    <span><i class="fas fa-clock"></i>Temps de cuisson : {{ $recipeDetails['readyInMinutes']}} min</span>
                                </div>
                                <button class="bg-danger text-white border-0 rounded py-2 mt-auto" style="font-size: 0.9rem;">
                                    <a href="{{ route('recipes.show', $recipe['id']) }}" class="text-white text-decoration-none">Voir la recette</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</body>
</html>
