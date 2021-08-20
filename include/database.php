<?php

function conectarBD(): mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'sistema_post_venta');

    if (!$db) {
        echo 'coneccion incorrecta';
        exit;
    }
    // echo 'coneccion exitosa';
    return $db;
}
