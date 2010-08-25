<?php

/**
 * Sets up the symfony container.
 *
 * @author Matthias Loitsch <matthias@loitsch.com>
 * @copyright Copyright (c) 2010, Matthias Loitsch
 * @package Ini
 */
include SYMFONY_PATH . 'sfServiceContainerAutoloader.php';

sfServiceContainerAutoloader::register();

$container = new sfServiceContainerBuilder();





/**
 * First lets get the system config, and put it in the container as parameters
 */
$container->
    register('systemConfig', 'IniFileConfig')->
    addArgument(INCLUDES_PATH . 'local.conf')->
    addArgument(INCLUDES_PATH . 'default.conf')->
    setFile(RINCEWIND_PATH . 'Config/IniFileConfig.php');


$container->setParameters($container->systemConfig->getArray(true));





/**
 * Define the two data sources
 */
$container->
    register('db', 'Postgresql')->
    addArgument('%database.database_name%')->
    addArgument('%database.username%')->
    addArgument('%database.host%')->
    addArgument('%database.port%')->
    addArgument('%database.password%')->
    addArgument('%database.search_path%')->
    setFile(RINCEWIND_PATH . 'Database/Postgresql.php');


$container->
    register('installationDb', 'Postgresql')->
    addArgument('%database.database_name%')->
    addArgument('%installation_database.username%')->
    addArgument('%database.host%')->
    addArgument('%database.port%')->
    addArgument('%installation_database.password%')->
    addArgument('%database.search_path%')->
    setFile(RINCEWIND_PATH . 'Database/Postgresql.php');





/**
 * Define the two DaoFactories
 */
$container->
    register('daoFactory', 'DaoFactory')->
    addArgument(new sfServiceReference('db'))->
    setFile(RINCEWIND_PATH . 'Factory/DaoFactory.php');
