<?php

use Ryinner\Githubinfo\Informer;

require_once __DIR__ . '/../vendor/autoload.php';


$informer = new Informer();

var_dump($informer->getUser());