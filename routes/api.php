<?php

use ContactFormAPI\Router;
use ContactFormAPI\Mailer;

$router = new Router();

$router->post('/api/contact', function () {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    $config = require __DIR__ . '/../config/config.php';
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data || !is_array($data)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Données invalides"]);
        return;
    }

    $mailer = new Mailer($config, $data);
    $result = $mailer->send();

    if ($result === true) {
        echo json_encode(["status" => "success", "message" => "Message envoyé avec succès"]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Erreur : " . $result]);
    }
});

$router->get('/api/ping', function () {
    header("Content-Type: application/json");
    echo json_encode(["status" => "ok", "message" => "Contact Form API is alive 🚀"]);
});

return $router;
