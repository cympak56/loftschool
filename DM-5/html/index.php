<?php

use Base\Application;

require '../vendor/autoload.php';
require '../src/config.php';
require '../src/db.php';

$app = new Application();
$app->run();