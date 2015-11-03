<?php
require_once __DIR__ . '/../vendor/autoload.php';
$myTemplatesPath = __DIR__.'/../templates';

$app = new Silex\Application();
$app->register(new \Silex\Provider\TwigServiceProvider(), array('twig.path' => $myTemplatesPath));
$app->get('/', 'kbk\MainController::indexAction');
$app->get('/about', 'kbk\MainController::aboutAction');
$app->run();