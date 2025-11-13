<?php

$router->get('/', 'HomeController@index');
$router->get('/categories', 'CategoriesController@display');
$router->get('/readmore', 'CategoriesController@readmore');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/settings', 'AdminController@settings');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/comments', 'AdminController@comments');
$router->get('/admin/posts', 'AdminController@posts');
$router->get('/admin/edit/{id}', 'AdminController@update');

//create
$router->post('/admin/posts', 'AdminController@create');

//update
$router->post('/admin/posts/update', 'AdminController@update');

//to delete post
$router->delete('/admin/post/delete/{id}', 'AdminController@delete');

