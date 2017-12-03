<?php


namespace App\Models;


class User extends Model
{
    const TABLE = 'Authors';
    public $Name;
    public $Surname;
    public $email;

    public function __get($key)
    {
        switch ($key) {
            case 'books':
                return \App\Models\Book::findAllByParam(['author_id' => $this->id]);
                break;
            default :
                return false;
                break;
        }

    }

    public function __isset($key)
    {
        switch ($key) {
            case 'books':
                return true;
                break;
            default :
                return false;
                break;
        }
    }


}