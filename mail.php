<?php 
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Use Composer's autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'foramdelvadiya@gmail.com'; // Your email
    $mail->Password = 'zave copr rawt eugt'; // Your App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('foramdelvadiya@gmail.com', $_REQUEST['fname']); // From address
    $mail->addAddress($_REQUEST['email']); // To address

    // Email content
    $mail->isHTML(true);
    $mail->Subject = $_REQUEST['fname'];

    // Create the email body
    $html = 'First Name: ' . $_REQUEST['fname'] . '<br>' . 
            'Last Name: ' . $_REQUEST['lname'] . '<br>' .
            'Email: ' . $_REQUEST['email'] . '<br>' .
            'Phone Number: ' . $_REQUEST['phone'] . '<br>' .
            'Message: ' . $_REQUEST['message'];

    $mail->Body = $html;

    // Send the email
    $mail->send();

    // Return success message in JSON format
    echo json_encode(["message" => "Success! Our team will contact you soon."]);

} catch (Exception $e) {
    // Return error message in JSON format
    echo json_encode(["message" => "Email could not be sent. Error: {$mail->ErrorInfo}"]);
}
?>
