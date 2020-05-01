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

/**
 * INVENTARIS
 */

$router->add(
    'inventaris/submit/([0-9])/:params',
    [
        'controller' => 'inventaris',
        'action' => 'submit',
        'isAdmin' => 1,
    ]
);

/**************************************
 ****************ADMIN*****************
 **************************************/

$router->add(
    '/admin/([0-9])/:params',
    [
        'controller' => 'admin',
        'action' => 'index',
        'isAdmin' => 1,
    ]
);

/**
 * INVENTARIS
 */

$router->add(
    '/admin/([0-9])/:params/createInv',
    [
        'controller' => 'admin',
        'action' => 'createInv',
        'isAdmin' => 1,
    ]
);

$router->add(
    '/admin/([0-9])/:params/listInv',
    [
        'controller' => 'admin',
        'action' => 'listInv',
        'isAdmin' => 1,
    ]
);

$router->add(
    '/admin/([0-9])/updateInv/([0-9])/:params',
    [
        'controller' => 'admin',
        'action' => 'updateInv',
        'isAdmin' => 1,
        'invenId' => 2,
    ]
);

$router->add(
    '/admin/([0-9])/deleteInv/([0-9])/:params',
    [
        'controller' => 'admin',
        'action' => 'deleteInv',
        'isAdmin' => 1,
        'invenId' => 2,
    ]
);

$router->add(
    '/admin/([0-9])/confirmInv/([0-9])/:params',
    [
        'controller' => 'admin',
        'action' => 'confirmInv',
        'isAdmin' => 1,
        'invenId' => 2,
    ]
);

$router->add(
    '/admin/([0-9])/declineInv/([0-9])/:params',
    [
        'controller' => 'admin',
        'action' => 'declineInv',
        'isAdmin' => 1,
        'invenId' => 2,
    ]
);

/**************************************
 **************MAHASISWA***************
 **************************************/

$router->add(
    '/mahasiswa/([0-9])/:params',
    [
        'controller' => 'mahasiswa',
        'action' => 'index',
        'userId' => 1,
    ]
);

$router->add(
    '/mahasiswa/([0-9])/listInv/:params',
    [
        'controller' => 'mahasiswa',
        'action' => 'listInv',
        'userId' => 1,
    ]
);

$router->add(
    '/mahasiswa/([0-9])/inv/([0-9])/:params',
    [
        'controller' => 'mahasiswa',
        'action' => 'requestInv',
        'userId' => 1,
        'invenId' => 2,
    ]
);

