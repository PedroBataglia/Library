<?php

declare(strict_types=1);

namespace Pedropetretti\Library\Entity;

class Book
{
    public readonly int $id;
    private ?string $filePath = null;

    public function __construct(public readonly string $name)
    {

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
