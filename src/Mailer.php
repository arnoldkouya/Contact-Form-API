<?php

namespace ContactFormAPI;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    protected $config;
    protected $data;

    public function __construct(array $config, array $data)
    {
        $this->config = $config;
        $this->data = $data;
    }

    protected function buildMessage(): string
    {
        $message = "📝 Nouveau message reçu depuis le formulaire :\n\n";
        foreach ($this->data as $key => $value) {
            $label = ucfirst(str_replace('_', ' ', htmlspecialchars($key)));
            $message .= "$label : " . htmlspecialchars($value) . "\n";
        }
        return $message;
    }

    public function send(): bool|string
    {
        $subject = $this->config['subject_prefix'] . ($this->data['subject'] ?? 'Message reçu');
        $from = $this->data['email'] ?? $this->config['default_from'];
        $fromName = $this->data['nom'] ?? 'Contact';

        if ($this->config['use_smtp']) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = $this->config['smtp']['host'];
                $mail->SMTPAuth = true;
                $mail->Username = $this->config['smtp']['username'];
                $mail->Password = $this->config['smtp']['password'];
                $mail->SMTPSecure = $this->config['smtp']['encryption'];
                $mail->Port = $this->config['smtp']['port'];

                $mail->setFrom($from, $fromName);
                $mail->addAddress($this->config['to_email']);
                $mail->Subject = $subject;
                $mail->Body = $this->buildMessage();

                $mail->send();
                return true;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            $headers = "From: $from\r\n";
            $headers .= "Reply-To: $from\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8";
            return mail($this->config['to_email'], $subject, $this->buildMessage(), $headers);
        }
    }
}
