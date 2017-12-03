<?php


namespace App\Traits;


trait Magic
{
    private $var_buffer = [];

    public function __get($key)
    {
        return $this->var_buffer[$key];
    }

    public function __set($key, $value)
    {
        $this->var_buffer[$key] = $value;
    }
}