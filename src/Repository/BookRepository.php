<?php

declare(strict_types=1);

namespace Pedropetretti\Library\Repository;

use Pedropetretti\Library\Entity\Book;
use PDO;

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
        $sql = 'INSERT INTO books (name, image_path) VALUES (?, ?);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $book->name);
        $statement->bindValue(2, $book->getFilePath());

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $book->setId(intval($id));
        return $result;
    }

    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM books WHERE id = ?;');
        $statement->bindValue(1, $id,\PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateBook($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydratebook(array $bookData): Book
    {
        $book = new Book($bookData['name']);
        $book->setId($bookData['id']);
        return $book;
    }

    public function update(Book $book): bool
    {
        $sql = "UPDATE books SET name = :name WHERE id = :id;";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':name', $book->name);
        $statement->bindValue(':id', $book->id, PDO::PARAM_INT);
        return $statement->execute();
    }
}

