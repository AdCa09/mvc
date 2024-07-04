<?php

declare(strict_types=1);

class ArticleController
{
    public function index()
    {
        $articles = $this->getArticles();

        require_once 'View/articles/articles.php';
    }


    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        try {
            require_once './config/connexionDB.php';

            $query = "SELECT * FROM articles";
            $stmt = $dbh->query($query);

            $rawArticles = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $rawArticles[] = $row;
            }

            $articles = [];
            foreach ($rawArticles as $rawArticle) {
                $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
            }

            return $articles;

        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return [];
        }
    }


    public function show()
    {
        // TODO: this can be used for a detail page
    }
}