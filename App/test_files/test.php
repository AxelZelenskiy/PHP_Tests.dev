<?php
require_once __DIR__.'\..\..\Config\autoload.php';
$books = \App\Models\Book::findAll();
\Helpers\Handlers::eco_dump($books[1]);