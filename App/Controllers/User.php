<?php


namespace App\Controllers;


class User
{
    public static $hello = 'Hello from User Controller';
    public function something(){
        echo "Hello world. I'm a user controller. Just text message and nothing else.";
    }
}