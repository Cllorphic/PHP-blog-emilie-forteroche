<h1>Commentaires</h1>

<h2 class="commentsTitle"><?= htmlspecialchars($article->getTitle()) ?></h2>

<h3>
    <a href="index.php?action=adminMonitoring">← Retour monitoring</a>
</h3>

<?php $totalPages = max(1, (int)ceil($total / $limit)); ?>

<section class="comments">
    <?php if (empty($comments)) : ?>
        <p>Aucun commentaire pour cet article.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($comments as $comment) : ?>
                <li>
                    <div class="smiley">❝</div>

                    <div class="detailComment" style="flex: 1;">
                        <div class="info">
                            <?= htmlspecialchars($comment->getPseudo()) ?>
                        </div>

                        <div class="content">
                            <?= nl2br(htmlspecialchars($comment->getContent())) ?>
                        </div>

                        <div class="footer" style="display:flex; justify-content:flex-end; align-items:center; gap:10px;">
                            <form method="post" action="index.php?action=deleteCommentAdmin" style="margin:0; padding:0; background:transparent; width:auto;">
                                <input type="hidden" name="comment_id" value="<?= (int)$comment->getId() ?>">
                                <input type="hidden" name="article_id" value="<?= (int)$article->getId() ?>">
                                <input type="hidden" name="page" value="<?= (int)$page ?>">
                                <button type="submit" title="Supprimer" aria-label="Supprimer"
                                    style="border:none; background:transparent; cursor:pointer; font-size:22px; line-height:1;">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div style="display:flex; justify-content:space-between; width:100%;">
            <h3>
                <?php if ($page > 1): ?>
                    <a href="index.php?action=adminComments&id=<?= (int)$article->getId() ?>&page=<?= $page - 1 ?>">← Précédent</a>
                <?php endif; ?>
            </h3>

            <h3>
                <?php if ($page < $totalPages): ?>
                    <a href="index.php?action=adminComments&id=<?= (int)$article->getId() ?>&page=<?= $page + 1 ?>">Suivant →</a>
                <?php endif; ?>
            </h3>
        </div>
    <?php endif; ?>
</section>
