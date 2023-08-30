<?php

declare(strict_types=1);

namespace Pedropetretti\Library\Controller;


use Pedropetretti\Library\Entity\Book;
use PedroPetretti\Library\Repository\BookRepository;

class NewBookController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function ProcessRequest(): void
    {
        $name = filter_input(INPUT_POST, 'name');
        if ($name === false) {
            header('Location: /?success=1');
            return;
        }
        $book = new Book($name);
        $success = $this->bookRepository->add($book);
        if ($success === false) {
            header('Location: /?success=0');
        } else {
            header('Location: /?success=1');
        }
    }
}
