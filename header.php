<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet Movie DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .movie-card img,
        .actor-card img {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }
        .actor-card img {
            height: 360px;
        }
        .movie-card, .actor-card {
            height: 100%;
        }
        .section-title {
            color: #0d6efd;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .hero {
            background: #ffffff;
            border-radius: 12px;
            padding: 2.5rem 1.5rem;
            text-align: center;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
            margin-bottom: 2rem;
        }
        .detail-poster {
            width: 100%;
            max-width: 320px;
            border-radius: 8px;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
        }
        .info-box {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1rem;
        }
        main {
            min-height: 80vh;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="popular.php" class="navbar-brand"><i class="bi bi-film"></i> Films</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="popular.php">Top films</a></li>
                <li class="nav-item"><a class="nav-link" href="topRated.php">Top Rated</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="genreDropdown" role="button" data-bs-toggle="dropdown">Genre</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="genreMovies.php?id=28">Action</a></li>
                        <li><a class="dropdown-item" href="genreMovies.php?id=12">Aventure</a></li>
                        <li><a class="dropdown-item" href="genreMovies.php?id=18">Drame</a></li>
                        <li><a class="dropdown-item" href="genreMovies.php?id=878">Science-Fiction</a></li>
                        <li><a class="dropdown-item" href="genreMovies.php?id=37">Western</a></li>
                    </ul>
                </li>
            </ul>

            <form action="search-movies.php" method="get" class="d-flex me-2 mb-2 mb-lg-0">
                <input type="text" class="form-control rounded-pill" placeholder="Search Films" name="query">
            </form>
            <form action="search-acteurs.php" method="get" class="d-flex">
                <input type="text" class="form-control rounded-pill" placeholder="Search Acteurs" name="query">
            </form>
        </div>
    </div>
</nav>
<main class="py-4">
