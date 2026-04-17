<?php
require_once('fonctions.php');
$acteurId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$acteur = $acteurId > 0 ? acteurDetails($acteurId) : [];
$movies = $acteurId > 0 ? acteurMovies($acteurId) : [];
require('header.php');
?>
<div class="container">
    <?php if (empty($acteur)): ?>
        <div class="alert alert-danger">Acteur introuvable.</div>
    <?php else: ?>
        <div class="row align-items-start g-4 mb-5">
            <div class="col-md-4 text-center">
                <img class="detail-poster" src="<?= htmlspecialchars(profileUrl($acteur['profile_path'] ?? null, 'h632')); ?>" alt="Photo de l'acteur">
            </div>
            <div class="col-md-8">
                <div class="info-box">
                    <h1 class="mb-3 text-center"><?= htmlspecialchars($acteur['name'] ?? 'Nom inconnu'); ?></h1>
                    <h6 class="bg-primary text-white text-center py-2 mb-3">Biographie</h6>
                    <p class="text-center"><?= htmlspecialchars($acteur['biography'] ?? 'Biographie non disponible.'); ?></p>
                    <p class="text-center mb-1"><strong>Date de naissance :</strong> <?= htmlspecialchars(formatDateFr($acteur['birthday'] ?? null)); ?></p>
                    <p class="text-center mb-1"><strong>Lieu de naissance :</strong> <?= htmlspecialchars($acteur['place_of_birth'] ?? 'Inconnu'); ?></p>
                    <p class="text-center mb-0"><strong>Popularité :</strong> <?= htmlspecialchars((string) ($acteur['popularity'] ?? '0')); ?></p>
                </div>
            </div>
        </div>

        <h2 class="section-title">Principaux films</h2>
        <div class="row g-4">
            <?php foreach ($movies as $movie): ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card movie-card shadow-sm">
                        <img src="<?= htmlspecialchars(posterUrl($movie['poster_path'] ?? null, 'w500')); ?>" alt="Affiche du film">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? 'Titre inconnu'); ?></h5>
                            <p class="small text-muted">Personnage : <?= htmlspecialchars($movie['character'] ?? 'Non précisé'); ?></p>
                            <a href="movie.php?id=<?= (int) ($movie['id'] ?? 0); ?>" class="btn btn-outline-primary mt-auto">Voir</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php require('footer.php'); ?>
