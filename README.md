# 📬 Contact Form API

Un mini framework PHP simple, léger et modulable pour gérer les **formulaires de contact** via **envoi SMTP** ou `mail()`.  
Il prend en charge des **champs dynamiques** et s’intègre facilement à n’importe quel frontend (HTML, JS, Vue, React...).

## 🚀 Fonctionnalités
- 📧 Envoi d’e-mails avec **SMTP sécurisé** (PHPMailer)
- 🧩 Prise en charge **automatique de tous les champs**
- 🔄 Compatible AJAX / API REST
- 🌐 Support CORS activé (pour frontend externe)
- ⚙️ Mode fallback `mail()` si SMTP désactivé

## 📦 Structure
- `config/` : Configuration SMTP et email
- `src/` : Classe Mailer + mini Router
- `routes/` : Déclaration des routes API
- `public/` : Point d’entrée HTTP
- `install.php` : Script d’installation CLI
- `composer.json` : Dépendances

## 🧪 Tester
- Lancer le serveur local :
  ```bash
  php -S localhost:8000 -t public
  ```
- Tester `GET /api/ping`
- Tester `POST /api/contact` avec des données JSON

## 💬 Exemple de POST JSON
```json
{
  "nom": "Jean",
  "email": "jean@example.com",
  "message": "Bonjour"
}
```

## 📬 Dépendance
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)

## 🔐 SMTP recommandé
- Infomaniak, Mailersend, Sendgrid, Gmail (mot de passe app), etc.

## 🔧 Installation
```bash
php install.php
```

## ✨ Développé par [KOUYA Group](https://kouya-group.fr)
