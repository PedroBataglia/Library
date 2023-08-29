<?php

namespace Pedropetretti\Library\Controller;

use Pedropetretti\Library\Repository\BookRepository;

class BookListController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {

    }

    public function processRequest(): void
    {
        $bookList = $this->bookRepository->all();
        var_dump($bookList);

        require_once __DIR__ . '/../../Views/video-list.php';
    }
}
