<?php

require __DIR__ . '/../vendor/autoload.php';

header("Content-Type: application/json; charset=UTF-8");

$router = require __DIR__ . '/../routes/api.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
