<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Inclure tous vos fichiers de modèle ici
require_once 'Model/Article.php';
require_once 'config/connexionDB.php';
// Inclure tous vos contrôleurs ici
require_once 'Controller/HomepageController.php';
require_once 'Controller/ArticleController.php';

// Obtenir la page actuelle à charger
$page = $_GET['page'] ?? null;

// Charger le contrôleur
// Il contrôlera le reste du travail pour charger la page
switch ($page) {
    case 'articles-index':
        (new ArticleController())->index();
        break;
    case 'articles':
        // TODO: page de détail
        (new ArticleController())->index();
        break;
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}
