<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main SMTP server (e.g., Gmail)
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dhruvil.shiroiya@somaiya.edu';             // Your email address
    $mail->Password = 'oigh dyws jdaz kgkl';              // Your email password or app password (if using Gmail)
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption
    $mail->Port = 587;                                    // TCP port for TLS

    //Recipients
    $mail->setFrom('dhruvil.shiroiya@somaiya.edu', 'Dhruvil shiroiya');  // Sender email and name
    $mail->addAddress('sarth.u@somaiya.edu');           // Add recipient email (P. Salunke)         // Add BCC recipient (Pratikshit S)

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'hehe';          // Email subject
    $mail->Body    = 'codecell no chodo <b>PHPMailer</b>!';  // Email body
    $mail->AltBody = 'This is a test email sent using PHPMailer (plain text)';  // Plain text for non-HTML mail clients

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
