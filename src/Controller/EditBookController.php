<?php

namespace Pedropetretti\Library\Controller;

use Pedropetretti\Library\Entity\Book;
use Pedropetretti\Library\Repository\BookRepository;

class EditBookController implements Controller
{

    public function __construct(private BookRepository $bookRepository)
    {
    }

    
    public function ProcessRequest(): void
    {   
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?success=0');
            return;
        }
        
        $name = filter_input(INPUT_POST, 'name');
        if ($name === false) {
            header('Locaiton: /?success=0');
            return;
        }

        $book = new Book($name);
        $book->setId($id);
        $success = $this->bookRepository->update($book);
        
        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
        
    }
}
