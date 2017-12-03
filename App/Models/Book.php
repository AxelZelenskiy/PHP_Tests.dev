<?php


namespace App\Models;


class Book extends Model
{
    const TABLE = 'books';
    public $book;
    public $author_id;

    public function __get($key)
    {
        switch ($key) {
            case "author":
                return User::findAllById($this->author_id);
                break;
            default:
                return false;
                break;
        }
    }

    public function __isset($key)
    {
        switch ($key) {
            case "author":
                return true;
                break;
            default :
                return false;
                break;
        }
    }
}