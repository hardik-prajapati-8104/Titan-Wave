<?php
// TITAN WAVE contact form mail handler.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Honeypot field: bots may fill this, genuine visitors will not see it.
if (!empty($_POST['website'] ?? '')) {
    header('Location: thank-you.php');
    exit;
}

$name    = trim((string)($_POST['name'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$phone   = trim((string)($_POST['phone'] ?? ''));
$service = trim((string)($_POST['service'] ?? ''));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

$fail = static function (string $message, int $status = 400): void {
    http_response_code($status);
    echo '<!doctype html><html lang="en"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Unable to send enquiry | TITAN WAVE</title><body style="font-family:Arial,sans-serif;background:#f5f6f8;padding:40px 20px;color:#171717"><main style="max-width:560px;margin:8vh auto;background:#fff;padding:36px;border-radius:12px"><h1>Unable to send your enquiry</h1><p>' . htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p><p><a href="contact.php" style="color:#e50914">Return to Contact Us</a></p></main></body></html>';
    exit;
};

if ($name === '' || $email === '' || $message === '') {
    $fail('Please complete your name, email address and message.');
}
if (mb_strlen($name) > 100 || strlen($email) > 254 || mb_strlen($phone) > 40 || mb_strlen($service) > 150 || mb_strlen($subject) > 200 || mb_strlen($message) > 10000) {
    $fail('One or more fields exceed the allowed length. Please shorten your entry and try again.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $email)) {
    $fail('Please enter a valid email address.');
}
// Reject line breaks in values that may be included in headers or mail metadata.
foreach ([$name, $phone, $service, $subject] as $value) {
    if (preg_match('/[\r\n]/', $value)) {
        $fail('Please remove line breaks from the form fields and try again.');
    }
}

$to = 'support@thetitanwave.com';
$from = 'support@thetitanwave.com'; // Use a mailbox on your own domain for reliable delivery.
$mailSubject = 'New Website Enquiry - TITAN WAVE';
if ($subject !== '') {
    $mailSubject .= ' - ' . $subject;
}

$escape = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};
$safeName = $escape($name);
$safeEmail = $escape($email);
$safePhone = $escape($phone !== '' ? $phone : 'Not provided');
$safeService = $escape($service !== '' ? $service : 'Not selected');
$safeSubject = $escape($subject !== '' ? $subject : 'Not provided');
$safeMessage = nl2br($escape($message));

$emailBody = '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>New TITAN WAVE Enquiry</title></head>' .
    '<body style="margin:0;padding:24px;background:#f5f6f8;font-family:Arial,sans-serif;color:#222;line-height:1.6">' .
    '<div style="max-width:650px;margin:0 auto;background:#fff;border:1px solid #e5e5e5;border-radius:8px;overflow:hidden">' .
    '<div style="background:#171717;color:#fff;padding:22px 26px;border-bottom:4px solid #e50914"><h2 style="margin:0">TITAN WAVE</h2><p style="margin:5px 0 0">New Website Contact Enquiry</p></div>' .
    '<div style="padding:26px"><p><strong>Full Name:</strong> ' . $safeName . '</p>' .
    '<p><strong>Email:</strong> ' . $safeEmail . '</p><p><strong>Phone:</strong> ' . $safePhone . '</p>' .
    '<p><strong>Service of Interest:</strong> ' . $safeService . '</p><p><strong>Subject:</strong> ' . $safeSubject . '</p>' .
    '<hr style="border:0;border-top:1px solid #e5e5e5;margin:22px 0"><p><strong>Message:</strong></p><p>' . $safeMessage . '</p>' .
    '<hr style="border:0;border-top:1px solid #e5e5e5;margin:22px 0"><p style="font-size:12px;color:#777">This enquiry was submitted through the TITAN WAVE website contact form.</p></div></div></body></html>';

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: TITAN WAVE Website <' . $from . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
];
$encodedSubject = '=?UTF-8?B?' . base64_encode($mailSubject) . '?=';

try {
    $sent = mail($to, $encodedSubject, $emailBody, implode("\r\n", $headers));
} catch (Throwable $e) {
    $sent = false;
}

if ($sent) {
    header('Location: thank-you.php');
    exit;
}
$fail('Your message could not be sent right now. Please try again later or email support@thetitanwave.com directly.', 500);
