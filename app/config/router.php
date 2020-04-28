<?php

$router = $di->getRouter();

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router->add(
    '/',
    [
        'controller' => 'pengguna',
        'action' => 'logout',
    ]
);

$router->add(
    '/login',
    [
        'controller' => 'pengguna',
        'action' => 'loginpage',
    ]
);

$router->addPut(
    '/inventaris/edit/3',
    [
        'controller' => 'inventaris',
        'action' => 'edit',
    ]
);

