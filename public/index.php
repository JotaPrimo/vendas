<?php

require_once '../vendor/autoload.php';
require_once '../app/Config/routes.php';
require_once '../app/Config/helpers.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\Biblioteca\Controllers');

// Start the routing
SimpleRouter::start();