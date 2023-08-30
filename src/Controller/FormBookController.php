<?php

namespace Pedropetretti\Library\Controller;

use PedroPetretti\Library\Entity\Book;
use Pedropetretti\Library\Repository\BookRepository;

class FormBookController implements Controller
{
    public function __construct(private BookRepository $repository)
    {
    }

    public function ProcessRequest(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Book $book */
        $book = null;
        if ($id !== false && $id !== null) {
            $book = $this->repository->find($id);
        }

        require_once __DIR__ . '/../../Views/video-form.php';
    }
}
