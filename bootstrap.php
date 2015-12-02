<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'kbk',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);