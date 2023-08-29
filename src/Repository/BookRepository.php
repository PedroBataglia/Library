<?php

namespace PedroPetretti\Library\Repository;

use PDO;
use PedroPetretti\Library\Books\Book;

class BookRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * @return Book[]
     */

    public function all(): array
    {
        $bookList = $this->pdo
            ->query('SELECT * FROM books;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            function (array $bookData) {
                $book = new Book($bookData['name']);
                $book->setId($bookData['id']);

                return $book;
            }, $bookList

        );
    }

    public function add(Book $book): bool
    {
        $sql = 'INSERT INTO book(name, image_path) VALUES (?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bidnValue(1, $book->name);
        $statement->bindValue(2, $book->getFilePath());

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $book->setId(intval($id));
        return $result;
    }

    public function find(int $id)
    {
        $book = [];
        $statement = $this->pdo->prepare('SELECT * FROM books WHERE id = ?;');
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();

         array_map(
            function (array $bookData) {
                $book = new Book($bookData['name']);
                $book->setId($bookData['id']);
                return $book;
            }, $book
        );

        return $book;
    }
}
