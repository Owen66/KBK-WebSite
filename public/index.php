<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$myTemplatesPath = __DIR__.'/../templates';
$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

$app = new Silex\Application();
$app->register(new \Silex\Provider\TwigServiceProvider(), array('twig.path' => $myTemplatesPath));
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider());


$isDevMode = true;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/../config"), $isDevMode);
$conn = array('driver' => 'pdo_mysql', 'user' => 'root', 'password' => '', 'dbname' => 'kbk',);
$entityManager = EntityManager::create($conn, $config);
$app['orm.em'] = $entityManager;

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
$app->get('/itemAdmin', 'AdminController::itemAction');
$app->get('/categoryAdmin', 'AdminController::categoryAction');
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