<?php require 'View/includes/header.php';
require_once " Controller/ArticleController.php"; ?>

<section>
    <h1>Liste des Articles</h1>
    <ul>
        <?php foreach ($rawArticles as $article): ?>
            <li>
                <h2><?= htmlspecialchars($article['title']) ?></h2>
                <p>Date de publication: <?= htmlspecialchars($article['publish_date']) ?></p>
                <p><?= htmlspecialchars($article['description']) ?></p>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'; ?>