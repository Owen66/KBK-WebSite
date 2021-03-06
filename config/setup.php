<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$myTemplatesPath = __DIR__.'/../templates';
$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

$app = new Silex\Application();
$app->register(new \Silex\Provider\TwigServiceProvider(), array('twig.path' => $myTemplatesPath));
$app->register(new \Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider());


$isDevMode = true;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/../config"), $isDevMode);
$conn = array('driver' => 'pdo_mysql', 'user' => 'root', 'password' => '', 'dbname' => 'kbk',);
$entityManager = EntityManager::create($conn, $config);
$app['orm.em'] = $entityManager;