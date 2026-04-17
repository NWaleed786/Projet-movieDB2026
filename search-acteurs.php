<?php
require_once('fonctions.php');
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$acteurs = [];
$message = '';

if (!isset($_GET['query'])) {
    $message = "Veuillez saisir un acteur à rechercher.";
} elseif ($query === '') {
    $message = "Le champ de recherche des acteurs est vide.";
} else {
    $acteurs = searchActeurs($query);
    if (empty($acteurs)) {
        $message = "Aucun acteur trouvé pour : " . htmlspecialchars($query);
    }
}

require('header.php');
?>
<div class="container">
    <h2 class="section-title">Résultat de la recherche d'acteurs</h2>
    <?php if ($query !== ''): ?>
        <p>Mot recherché : <strong><?= htmlspecialchars($query); ?></strong></p>
    <?php endif; ?>

    <?php if ($message !== ''): ?>
        <div class="alert alert-warning"><?= $message; ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <?php foreach ($acteurs as $acteur): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card actor-card shadow-sm">
                    <img src="<?= htmlspecialchars(profileUrl($acteur['profile_path'] ?? null)); ?>" alt="Photo de l'acteur">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($acteur['name'] ?? 'Nom inconnu'); ?></h5>
                        <p class="small text-muted">Popularité : <?= htmlspecialchars((string) ($acteur['popularity'] ?? '0')); ?></p>
                        <a href="acteur.php?id=<?= (int) ($acteur['id'] ?? 0); ?>" class="btn btn-primary mt-auto">Voir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require('footer.php'); ?>
