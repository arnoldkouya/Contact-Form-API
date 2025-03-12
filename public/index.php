<?php

require __DIR__ . '/../vendor/autoload.php';

$router = require __DIR__ . '/../routes/api.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
