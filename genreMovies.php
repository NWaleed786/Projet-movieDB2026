<?php
require_once('fonctions.php');
$genreId = isset($_GET['id']) ? (int) $_GET['id'] : 28;
$movies = moviesByGenre($genreId);
$genreName = getGenreName($genreId);
require('header.php');
?>
<div class="container">
    <h2 class="section-title">Films du genre : <?= htmlspecialchars($genreName); ?></h2>
    <div class="row g-4">
        <?php foreach ($movies as $movie): ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card movie-card shadow-sm">
                    <img src="<?= htmlspecialchars(posterUrl($movie['poster_path'] ?? null, 'w500')); ?>" alt="Affiche du film">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? 'Titre inconnu'); ?></h5>
                        <a href="movie.php?id=<?= (int) ($movie['id'] ?? 0); ?>" class="btn btn-outline-primary mt-auto">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require('footer.php'); ?>
