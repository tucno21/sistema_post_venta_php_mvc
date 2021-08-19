<?php
//agregar funciones
require 'functions.php';
require 'database.php';
//agregando autoload
require __DIR__ . '/../vendor/autoload.php';

use Model\ActiveRecord;

//conectarnos a la base de datos
$connected = conectarBD();

//enviar la coneccion a ActiveRecord
ActiveRecord::setBD($connected);
