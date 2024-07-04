<?php require 'View/includes/header.php';


echo "<pre>";
var_dump($articles);
echo "</pre>";
?>

<section>
    <h1>Liste des Articles</h1>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <h2><?= htmlspecialchars($article->title) ?></h2>
                <p>Date de publication: <?= ($article->publish_date) ?></p>
                <p><?= htmlspecialchars($article->description) ?></p>
                <hr>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'; ?>