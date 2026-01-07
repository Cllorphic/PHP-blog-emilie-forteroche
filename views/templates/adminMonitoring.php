<h2>Monitoring des articles</h2>

<div class="adminArticle adminMonitoring">
    <!-- Ligne d'en-tête -->
    <div class="articleLine head">
        <div class="title">Titre</div>
        <div class="stat">Vues</div>
        <div class="stat">Commentaires</div>
        <div class="date">Date de publication</div>
    </div>

    <!-- Lignes de données -->
    <?php foreach ($articles as $article): ?>
        <div class="articleLine">
            <div class="title"><?= htmlspecialchars($article['title']) ?></div>
            <div class="stat"><?= (int)$article['views'] ?></div>
            <div class="stat"><?= (int)$article['comments_count'] ?></div>
            <div class="date"><?= htmlspecialchars($article['date_creation']) ?></div>
        </div>
    <?php endforeach; ?>
</div>

<a class="submit" href="index.php?action=admin">Retour admin</a>
