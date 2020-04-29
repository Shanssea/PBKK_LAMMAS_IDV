<?php

$router = $di->getRouter();

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);


$router->add(
    '/login',
    [
        'controller' => 'pengguna',
        'action' => 'loginpage',
    ]
);

$router->add(
    '/inventaris/edit/([0-9])/:params',
    [
        'controller' => 'inventaris',
        'action' => 'edit',
        'invenId' => 1,
    ]
);

$router->add(
    '/mahasiswa/([0-9])/:params',
    [
        'controller' => 'mahasiswa',
        'action' => 'index',
        'userId' => 1,
    ]
);

