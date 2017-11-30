<?php


namespace Helpers;


class Handlers
{
    public static function eco_dump($something)
    {
        echo "<pre>";
        var_dump($something);
        echo "</pre>";
    }
}