<?php

$dbpath = __DIR__ . 'banco.sqlite';
$pdo = new PDO("sqlite:$dbpath");
$pdo->exec('ALTER TABLE books ADD COLUMN author TEXT;');
