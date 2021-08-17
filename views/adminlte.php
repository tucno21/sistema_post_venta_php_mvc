<?php
//link de los JS CSS
$linkURL = 'adminLte/';

// DATOS GENERALES ADMIN
$title = 'AdminLTE <b>3</b>';
$titleBar = 'AdminLTE 3';
$titlelogin = '<b>Admin</b>LTE';
$logo = 'dist/img/AdminLTELogo.png';
$mainLink = 'index3.html';


//DATOS DEL USUARIO ADMIN
$name = 'Carlos';
$photo = 'dist/img/user2-160x160.jpg';

//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'Perfil',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-address-card',
    ],
    [
        'text' => 'Cerrar sesión',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-times-circle',
    ],
];


//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    ['header' => 'ADMINISTRADOR'],
    [
        'mode' => 'menu',
        'text' => 'profile',
        'url'  => 'admin/settings',
        'class' => 'nav-header',
        'icon' => 'fas fa-user',
    ],
    [
        'mode' => 'menu',
        'text' => 'change_password',
        'url'  => 'admin/settings',
        'icon' => 'fas fa-fw fa-lock',
    ],
    [
        'mode' => 'submenu',
        'text'    => 'Categorias',
        'url'    => '#',
        'icon' => 'fas fa-fw fa-lock',
        'submenu' => [
            [
                'text' => 'crear',
                'url'  => 'www.google.com',
                'icon' => 'far fa-circle ',
            ],
            [
                'text' => 'editar',
                'url'  => 'www.google.com',
                'icon' => 'far fa-circle ',
            ],
        ],

    ],
    ['header' => 'CLIENTES'],
];
