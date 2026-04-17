<?php
require_once('fonctions.php');
$movies = popularMovies();
require('header.php');
?>
<div class="container">
    <div class="hero">
        <h1>Films les plus populaires</h1>
        <p class="text-muted mb-0">Cette page affiche les films populaires récupérés depuis l'API TMDB.</p>
    </div>

    <div class="row g-4">
        <?php foreach ($movies as $movie): ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card movie-card shadow-sm">
                    <img src="<?= htmlspecialchars(posterUrl($movie['poster_path'] ?? null, 'w500')); ?>" alt="Affiche du film">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? 'Titre inconnu'); ?></h5>
                        <p class="card-text text-muted small"><?= limitText($movie['overview'] ?? '', 110); ?></p>
                        <a href="movie.php?id=<?= (int) ($movie['id'] ?? 0); ?>" class="btn btn-outline-primary mt-auto">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require('footer.php'); ?>
