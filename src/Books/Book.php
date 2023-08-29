<?php

namespace PedroPetretti\Library\Books;

class Book
{
    public readonly int $id;
    public readonly string $name;
    private ?string $filePath = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }
}
