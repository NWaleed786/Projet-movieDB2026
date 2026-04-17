<?php
require_once('fonctions.php');
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$movies = [];
$message = '';

if (!isset($_GET['query'])) {
    $message = "Veuillez saisir un film à rechercher.";
} elseif ($query === '') {
    $message = "Le champ de recherche des films est vide.";
} else {
    $movies = searchMovies($query);
    if (empty($movies)) {
        $message = "Aucun film trouvé pour : " . htmlspecialchars($query);
    }
}

require('header.php');
?>
<div class="container">
    <h2 class="section-title">Résultat de la recherche de films</h2>
    <?php if ($query !== ''): ?>
        <p>Mot recherché : <strong><?= htmlspecialchars($query); ?></strong></p>
    <?php endif; ?>

    <?php if ($message !== ''): ?>
        <div class="alert alert-warning"><?= $message; ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <?php foreach ($movies as $movie): ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card movie-card shadow-sm">
                    <img src="<?= htmlspecialchars(posterUrl($movie['poster_path'] ?? null, 'w500')); ?>" alt="Affiche du film">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? 'Titre inconnu'); ?></h5>
                        <p class="small text-muted"><?= limitText($movie['overview'] ?? '', 110); ?></p>
                        <a href="movie.php?id=<?= (int) ($movie['id'] ?? 0); ?>" class="btn btn-primary mt-auto">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require('footer.php'); ?>
