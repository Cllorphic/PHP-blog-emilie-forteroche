<?php

class CommentController 
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment() : void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }
   public function adminComments(): void
{
    // Optionnel : même protection que l'admin
    
    if (!isset($_SESSION['user'])) {
        Utils::redirect('connectionForm');
        return;
    }

    $articleId = (int) Utils::request('id');
    $page = max(1, (int) Utils::request('page', 1));
    $limit = 10;
    $offset = ($page - 1) * $limit;

    $articleManager = new ArticleManager();
    $article = $articleManager->getArticleById($articleId);

    if ($article === null) {
        throw new Exception("Article introuvable.");
    }

    $commentManager = new CommentManager();
    $comments = $commentManager->getCommentsByArticleIdPaginated($articleId, $limit, $offset);
    $total = $commentManager->countCommentsByArticleId($articleId);

    $view = new View("Admin - Commentaires");
    $view->render("adminComments", [
        'article' => $article,
        'comments' => $comments,
        'page' => $page,
        'limit' => $limit,
        'total' => $total
    ]);
}

public function deleteAdmin(): void
{
    if (!isset($_SESSION['user'])) {
        Utils::redirect('connectionForm');
        return;
    }

    $commentId = (int) Utils::request('comment_id');
    $articleId = (int) Utils::request('article_id');
    $page = max(1, (int) Utils::request('page', 1));

    $commentManager = new CommentManager();
    $comment = $commentManager->getCommentById($commentId);

    if ($comment !== null) {
        $commentManager->deleteComment($comment); // ✅ méthode qui existe chez toi
    }

    Utils::redirect('adminComments', [
        'id' => $articleId,
        'page' => $page
    ]);
}

}