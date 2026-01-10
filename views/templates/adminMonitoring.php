<?php
$sort = $_GET['sort'] ?? 'date_creation';
$order = $_GET['order'] ?? 'desc';
$newOrder = ($order === 'asc') ? 'desc' : 'asc';
?>

<h2>Monitoring des articles</h2>

<table class="adminArticle">
    <thead>
        <tr>
            <th class="col-title">
                <a href="index.php?action=adminMonitoring&sort=title&order=<?= $newOrder ?>">
                    Titre <?= $sort === 'title' ? ($order === 'asc' ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
            <th class="col-stat">
                <a href="index.php?action=adminMonitoring&sort=views&order=<?= $newOrder ?>">
                    Vues <?= $sort === 'views' ? ($order === 'asc' ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
            <th class="col-stat">
                <a href="index.php?action=adminMonitoring&sort=comments_count&order=<?= $newOrder ?>">
                    Commentaires <?= $sort === 'comments_count' ? ($order === 'asc' ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
            <th class="col-date">
                <a href="index.php?action=adminMonitoring&sort=date_creation&order=<?= $newOrder ?>">
                    Date de publication <?= $sort === 'date_creation' ? ($order === 'asc' ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
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