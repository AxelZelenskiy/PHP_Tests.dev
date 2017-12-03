<?php
require_once __DIR__.'\..\..\Config\autoload.php';
$books = \App\Models\Book::findAll();
foreach ($books as $book) {
    echo "<h2>". $book->whats_write."</h2>";
    if (!empty($book->author)) {
        echo "Author name is ".$book->author->Name." <br>. Authors Surname is ".$book->author->Surname."</br>";
    }
}

$user = \App\Models\User::findAll();
Helpers\Handlers::eco_dump($user[0]->books);