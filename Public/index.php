<?php

declare(strict_types=1);

use Pedropetretti\Library\Entity\Book;
use Pedropetretti\Library\Repository\BookRepository;
use Pedropetretti\Library\Controller\{BookListController,
    NewBookController,
    FormBookController,
    FilterBookController
};

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new \PDO("sqlite:$dbPath");
$bookRepository = new BookRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO']  ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllersClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllersClass($bookRepository);
} else {
    $controller = new Error404Controller();
}

$controller->processRequest();

