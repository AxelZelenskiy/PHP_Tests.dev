<?php


namespace App\Traits;


class Settings
{
    public $data = [
        'db' => 'localhost',
        'user' => 'root'
    ];
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}