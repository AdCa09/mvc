<?php

declare(strict_types = 1);

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // TODO: prepare the database connection
        require_once './config/connexionDB.php';
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)
        $query = "SELECT * FROM mvc";
        $stmt = $dbh->query($query);
        $rawArticles = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rawArticles[] = $row;
        }
        foreach ($rawArticles as $article) {
            echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
            echo "<p>Date de publication: " . htmlspecialchars($article['publish_date']) . "</p>";
            echo "<p>" . htmlspecialchars($article['description']) . "</p>";
            echo "<hr>";
        }

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}