<?php

return [
    'GET|/' => \Pedropetretti\Library\Controller\BookListController::class,
    'GET|/new-book' => \Pedropetretti\Library\Controller\FormBookController::class,
    'POST|/new-book' => \Pedropetretti\Library\Controller\NewBookController::class,
];
