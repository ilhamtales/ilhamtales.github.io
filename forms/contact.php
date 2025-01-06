<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace with your real receiving email address
$receiving_email_address = 'alfarizifiqih018@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;

// Validate input to prevent injection
$contact->from_name = htmlspecialchars($_POST['name']);
$contact->from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$contact->subject = htmlspecialchars($_POST['subject']);

// Uncomment the following code to use SMTP for email sending
/*
$contact->smtp = array(
  'host' => 'smtp.gmail.com', // Your SMTP host
  'username' => 'email_anda@gmail.com', // Your email address
  'password' => 'password_aplikasi', // Your app password (not your real password)
  'port' => '587' // SMTP port for TLS
);
*/

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
