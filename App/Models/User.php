<?php


namespace App\Models;


class User extends Model
{
    const TABLE = 'Authors';
    public $Name;
    public $Surname;
    public $email;
    public $books;
    public $id;
    public static $hello = 'Hello from model';
}