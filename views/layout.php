<?php

// variables generales y creador de muna lateral
include 'adminlte.php';

//cabeza de la pplantilla
include 'adminLte/AdminHead.php';


// if (isset($_SESSION["admin"])) {


//menu supererior
include 'adminLte/AdminMenu.php';

//menu lateral
include 'adminLte/AdminMenuLateral.php';

//cuerpo en blanco
// include 'adminLte/paginaWhite.php';
echo $contenidoLayout;

//footer
include 'adminLte/AdminFooter.php';

//
// } else {

//     //login
//     include 'adminLte/login.php';
// }

//script
include 'adminLte/AdminScript.php';
