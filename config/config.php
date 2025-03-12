<?php

return [
    'use_smtp' => true,
    'to_email' => 'hello@kouya-group.fr',
    'subject_prefix' => '[Contact Form] ',
    'default_from' => 'noreply@kouya-group.fr',
    'smtp' => [
        'host' => 'smtp.kouya-group.fr',
        'port' => 587,
        'username' => 'smtp_user',
        'password' => 'smtp_password',
        'encryption' => 'tls'
    ]
];
