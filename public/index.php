<?php

use App\Kernel;

require_once dirname(__DIR__) . "/vendor/autoload.php";

if (php_sapi_name() == "cli-server") {
    $file = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) return false;
}

$kernel = new Kernel(dirname(__DIR__));