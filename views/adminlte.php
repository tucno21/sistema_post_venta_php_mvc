<?php
//link de los JS CSS
$linkURL = '../adminLte/';

// DATOS GENERALES ADMIN
$title = 'AdminLTE <b>3</b>';
$titleBar = 'AdminLTE 3';
$titlelogin = '<b>Admin</b>LTE';
$logo = '../adminLte/dist/img/AdminLTELogo.png';
$mainLink = '/';


//DATOS DEL USUARIO ADMIN

$name = 'Carlos';
$photo = '../adminLte/dist/img/user2-160x160.jpg';

//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'Perfil',
        'url'  => '#',
        'icon' => 'fas fa-address-card',
    ],
    [
        'text' => 'Cerrar sesión',
        'url'  => '/logout',
        'icon' => 'fas fa-times-circle',
    ],
];


//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    ['header' => 'ADMINISTRAR'],
    [
        'mode' => 'menu',
        'text' => 'Usuarios',
        'url'  => '/usuarios',
        'class' => 'nav-header',
        'icon' => 'fas fa-user',
    ],
    [
        'mode' => 'menu',
        'text' => 'Categorias',
        'url'  => '/categorias',
        'icon' => 'fab fa-fw fa-buffer',
    ],
    [
        'mode' => 'menu',
        'text' => 'Productos',
        'url'  => '/productos',
        'icon' => 'fab fa-product-hunt',
    ],
    [
        'mode' => 'menu',
        'text' => 'Clientes',
        'url'  => '/clientes',
        'icon' => 'fa fa-users',
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Ventas',
        'url'    => '#',
        'icon' => 'fas fa-cart-arrow-down',
        'submenu' => [
            [
                'text' => 'Administrar ventas',
                'url'  => '/ventas',
                'icon' => 'fas fa-tasks',
            ],
            [
                'text' => 'Crear ventas',
                'url'  => '/crear-ventas',
                'icon' => 'far fa-plus-square',
            ],
            [
                'text' => 'Reportes de ventas',
                'url'  => '/reportes',
                'icon' => 'fas fa-file-invoice-dollar',
            ],
        ],

    ],
    ['header' => 'CLIENTES'],
];
