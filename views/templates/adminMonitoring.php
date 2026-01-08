<h2>Monitoring des articles</h2>

<table class="adminArticle">
    <thead>
        <tr>
            <th class="col-title">Titre</th>
            <th class="col-stat">Vues</th>
            <th class="col-stat">Commentaires</th>
            <th class="col-date">Date de publication</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td class="col-title"><?= htmlspecialchars($article['title']) ?></td>
                <td class="col-stat"><?= (int)$article['views'] ?></td>
                <td class="col-stat"><?= (int)$article['comments_count'] ?></td>
                <td class="col-date"><?= htmlspecialchars($article['date_creation']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="submit" href="index.php?action=admin">Retour admin</a>