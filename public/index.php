<?php
require_once __DIR__ . '/../config/setup.php';

//Main public Routes
$app->get('/', 'MainController::indexAction');
$app->get('/about', 'MainController::aboutAction');
$app->get('/contact', 'MainController::contactAction');
//Public Routes for Products
$app->get('/products', 'ProductsController::productsAction');
$app->get('/products/{cat}', 'ProductsController::catAction');
$app->get('/item/{itemId}', 'ProductsController::itemAction');
//Entering Secure Area
$app->get('/login', 'LoginController::loginAction');
//Secure Routes
$app->get('/admin', 'AdminController::adminAction');
$app->get('/userAdmin', 'UserController::readAction');
$app->get('/itemAdmin', 'ItemController::readAction');
$app->get('/categoryAdmin', 'CategoryController::readAction');
//Secure Actions
$app->post('/createUser', 'UserController::CreateAction');
$app->post('/updateUser', 'UserController::updateAction');
$app->post('/deleteUser', 'UserController::deleteAction');

$app->post('/createItem', 'ItemController::CreateAction');
$app->post('/updateItem', 'ItemController::updateAction');
$app->post('/deleteItem', 'ItemController::deleteAction');

$app->post('/createCategory', 'CategoryController::CreateAction');
$app->post('/updateCategory', 'CategoryController::updateAction');
$app->post('/deleteCategory', 'CategoryController::deleteAction');

$app->run();