<?php
require_once __DIR__ . '/../vendor/autoload.php';
$myTemplatesPath = __DIR__.'/../templates';

$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

$app = new Silex\Application();
$app->register(new \Silex\Provider\TwigServiceProvider(), array('twig.path' => $myTemplatesPath));
$app->get('/', 'kbk\MainController::indexAction');
$app->get('/about', 'kbk\MainController::aboutAction');
$app->get('/products', 'kbk\MainController::productsAction');
$app->get('/products/{cat}', 'kbk\MainController::catAction');
$app->get('/item/{itemId}', 'kbk\MainController::itemAction');
$app->get('/contact', 'kbk\MainController::contactAction');
$app->run();