#!/usr/bin/env php
<?php

echo "🔧 Installation Contact Form API...\n";

// Step 1: Check Composer
if (!file_exists(__DIR__ . '/composer.json')) {
    echo "❌ Fichier composer.json introuvable. Lancez ce script depuis la racine du projet.\n";
    exit(1);
}

echo "📦 Installation des dépendances via Composer...\n";
passthru('composer install');

echo "✅ Installation terminée !\n";
echo "➡️ Configurez vos paramètres SMTP dans config/config.php\n";
echo "➡️ Pointez votre domaine vers le dossier public/\n";
echo "➡️ Accédez à /api/ping pour vérifier l’API.\n";
