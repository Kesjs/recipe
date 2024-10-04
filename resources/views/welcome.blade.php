<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cooking Recipe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

    <!-- Styles -->
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
            font-family: 'Space Grotesk';
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="bg-white p-5 rounded shadow-lg min-vh-100 mb-5">
            <!-- Navbar Header -->
            <nav class="navbar navbar-expand-lg bg-white  rounded shadow-lg d-flex justify-content-between ">
                <div class="container-fluid justify-content-center ">
                    <a href="/" class="navbar-brand">
                        <img src="logo.png" alt="Logo" width="80" height="65">
                        <span class="text-danger" style="font-size: 1.5rem; font-weight: bold;">Cooking</span>
                        <span class="text-dark" style="font-size: 1.5rem; font-weight: bold;">Recipe</span>

                    </a>


                    <!-- Button for Collapse -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Collapsible Menu -->
                    <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
                        <ul class="navbar-nav  mb-2 mb-lg-0">
                            <li class="nav-item ms-3">
                                <a href="/" class="nav-link active px-2 bg-danger text-white rounded">Accueil</a>
                            </li>

                            <li class="nav-item ms-3">
                                <a class="nav-link" href="#" role="button"  aria-expanded="false">
                                    Recettes de cuisine
                                </a>

                            </li>
                            <li class="nav-item ms-3">
                                <a href="actu" class="nav-link text-black rounded">L'actu cuisine</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<br><br>
            <!-- Page Content -->
            <h2 class="custom-title text-center margin-top:10px;">Découvrez des Recettes Délicieuses</h2>
            <h2 class="custom-title text-center">Pour Chaque Instant</h2>

            <div class="text-center p-3 mb-3">
                <img src="cc.jpeg" alt="Image" class="img-fluid">
            </div>

            <p class="fs-5">
                <br><br> Que vous soyez un cuisinier en herbe ou un chef expérimenté, notre plateforme vous propose une sélection de recettes savoureuses et faciles à réaliser. Explorez une multitude de plats adaptés à vos goûts et vos besoins alimentaires, et laissez-vous guider par nos suggestions pour cuisiner des repas sains, gourmands et variés. Simplifiez vos repas quotidiens avec des ingrédients frais et des idées originales !
            </p>
        </div>
    </div>
</body>
</html>
