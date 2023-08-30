<?php

return [
    'GET|/' => \Pedropetretti\Library\Controller\BookListController::class,
    'GET|filter-book', \Pedropetretti\Library\Controller\FilterBookController::class,
    'POST|/new-book' => \Pedropetretti\Library\Controller\NewBookController::class,
    'GET|/new-book' => \Pedropetretti\Library\Controller\FormBookController::class,
];
