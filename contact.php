<?php
declare(strict_types=1);

$to = 'octavelejeune80@gmail.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html#section-contact');
    exit;
}

$lastName = trim((string)($_POST['last_name'] ?? ''));
$firstName = trim((string)($_POST['first_name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($lastName === '' || $firstName === '' || $email === '' || $message === '') {
    header('Location: index.html?error=1#section-contact');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?error=1#section-contact');
    exit;
}

$clean = static function (string $value): string {
    return str_replace(["\r", "\n"], ' ', $value);
};

$fromName = $clean($firstName . ' ' . $lastName);
$subject = $subject !== '' ? $clean($subject) : 'Nouveau message via le portfolio';

$body = "Nom: {$fromName}\r\n";
$body .= "Email: {$email}\r\n\r\n";
$body .= $message;

$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';
$headers[] = 'From: ' . $fromName . ' <' . $email . '>';
$headers[] = 'Reply-To: ' . $email;

$sent = mail($to, $subject, $body, implode("\r\n", $headers));

if ($sent) {
    header('Location: index.html?sent=1#section-contact');
    exit;
}

header('Location: index.html?error=1#section-contact');
exit;
