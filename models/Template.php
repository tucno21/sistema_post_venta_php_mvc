<?php

namespace Model;

class Template
{
    protected static $db;

    //recibe la coneccion a la BD
    public static function setBD($connected)
    {
        self::$db = $connected;
    }
}
