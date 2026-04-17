<?php
require_once('fonctions.php');
$movieId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$movie = $movieId > 0 ? movieDetails($movieId) : [];
$cast = $movieId > 0 ? array_slice(movieCredits($movieId), 0, 8) : [];
require('header.php');
?>
<div class="container">
    <?php if (empty($movie)): ?>
        <div class="alert alert-danger">Film introuvable.</div>
    <?php else: ?>
        <div class="row align-items-start g-4 mb-5">
            <div class="col-md-4 text-center">
                <img class="detail-poster" src="<?= htmlspecialchars(posterUrl($movie['poster_path'] ?? null, 'w500')); ?>" alt="Affiche du film">
            </div>
            <div class="col-md-8">
                <div class="info-box">
                    <h1 class="mb-3 text-center"><?= htmlspecialchars($movie['title'] ?? 'Titre inconnu'); ?></h1>
                    <h6 class="bg-primary text-white text-center py-2 mb-3">Genre</h6>
                    <p class="text-center"><?= htmlspecialchars($movie['overview'] ?? 'Aucun résumé disponible.'); ?></p>
                    <p class="text-center mb-1"><strong>Date de sortie :</strong> <?= htmlspecialchars(formatDateFr($movie['release_date'] ?? null)); ?></p>
                    <p class="text-center mb-1"><strong>Note :</strong> <?= htmlspecialchars((string) ($movie['vote_average'] ?? '0')); ?>/10</p>
                    <p class="text-center mb-0"><strong>Genres :</strong>
                        <?php
                        $genreNames = [];
                        foreach (($movie['genres'] ?? []) as $genre) {
                            $genreNames[] = $genre['name'];
                        }
                        echo htmlspecialchars(implode(', ', $genreNames));
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <h2 class="section-title">Principaux acteurs</h2>
        <div class="row g-4">
            <?php foreach ($cast as $acteur): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card actor-card shadow-sm">
                        <img src="<?= htmlspecialchars(profileUrl($acteur['profile_path'] ?? null)); ?>" alt="Photo de l'acteur">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($acteur['name'] ?? 'Nom inconnu'); ?></h5>
                            <p class="small text-muted">Rôle : <?= htmlspecialchars($acteur['character'] ?? 'Non précisé'); ?></p>
                            <a href="acteur.php?id=<?= (int) ($acteur['id'] ?? 0); ?>" class="btn btn-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php require('footer.php'); ?>
