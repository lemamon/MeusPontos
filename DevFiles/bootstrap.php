<?php
// bootstrap.php
require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache as Cache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\ClassLoader;

$loader = new ClassLoader('Entity', __DIR__ . '/src/Entity');
$loader->register();
$loader = new ClassLoader('EntityProxy', __DIR__ . '/src/Entity');
$loader->register();

//Configuration
$config = new Configuration();
$cache = new Cache();
$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__ . '/src/Entity');
$config->setProxyNamespace('EntityProxy');
$config->setEntityNamespaces(array('Entity'));
$config->setAutoGenerateProxyClasses(TRUE);

AnnotationRegistry::registerFile(__DIR__ . "/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
$driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
    new Doctrine\Common\Annotations\AnnotationReader(),
    array(__DIR__ . '/src/Entity')
);

$config->setMetadataDriverImpl($driver);
$config->setMetadataCacheImpl($cache);

$confgFile = __DIR__ . '/src/meuspontos.ini';
if (file_exists($confgFile)) {
    $db = parse_ini_file($confgFile);
    
    $connectionOptions = array(
        'driver' => $db['driver'],
        'host' => $db['host'],
        'user' => $db['user'],
        'password' => $db['password'],
        'dbname' => $db['dbname']
    );

} else {
    echo 'Arquivo .ini de configuração não encontrado!';
}

//getting EntityManager
$entityManager = EntityManager::create($connectionOptions, $config);
