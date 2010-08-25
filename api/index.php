<?php


include(dirname(dirname(__FILE__)) . '/includes/ini.php');

$daoFactory = $container->daoFactory;

$daoFactory->get('User');