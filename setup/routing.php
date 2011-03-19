<?php

$routes = array(
    //BUILD
    //Home page
    array(
        'alias'  => '/^\/?$/',
        'folder' => 'home',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    //404 page
    array(
        'alias'  => '/^404\/?$/',
        'folder' => '404',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    array(
        'alias'  => '/^symfony2\/?$/',
        'folder' => 'symfony2',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    array(
        'alias'  => '/^doctrine2\/?$/',
        'folder' => 'doctrine2',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    array(
        'alias'  => '/^git\/?$/',
        'folder' => 'git',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    array(
        'alias'  => '/^jqueryui\/?$/',
        'folder' => 'jqueryui',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    array(
        'alias'  => '/^sphinx\/?$/',
        'folder' => 'sphinx',
        'file'   => 'index.php',
        'layout' => 'defaultLayout.php'
    ),
    
);
