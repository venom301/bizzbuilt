<?php

$router->get('/', 'HomeController@index');
$router->get('/categories', 'CategoriesController@display');
$router->get('/readmore', 'CategoriesController@readmore');