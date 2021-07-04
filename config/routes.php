<?php

return array(
    // Пользователь:
    'user/login' => 'user/login', // actionLogin в UserController
    'user/logout' => 'user/logout', // actionLogout в UserController

    // Управление задачами:  
    'admin/todoitems/update/([0-9]+)' => 'todoitems/update/$1', // actionUpdate в TodoitemsController

    // Todoitem
    'todoitems/create' => 'todoitems/create', // actionCreate в TodoitemsController
    
    // Главная страница
    'index.php/([a-z]+)/([a-z]+)/page-([0-9]+)' => 'site/index/$1/$2/$3', // actionIndex в SiteController
    '([a-z]+)/([a-z]+)/page-([0-9]+)' => 'site/index/$1/$2/$3', // actionIndex в SiteController
    
    'index.php/([a-z]+)/([a-z]+)' => 'site/index/$1/$2', // actionIndex в SiteController
    '([a-z]+)/([a-z]+)' => 'site/index/$1/$2', // actionIndex в SiteController

    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);