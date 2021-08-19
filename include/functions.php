<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function debuguear($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '<br>';
    echo '</pre>';
    exit;
}
