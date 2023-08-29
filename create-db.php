<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec('CREATE TABLE books(id INTEGER PRIMARY KEY, name TEXT, image_path TEXT);');