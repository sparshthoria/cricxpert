<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure you have PHPMailer installed via Composer

// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ds"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Check if email already exists
    $emailCheck = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $emailCheck->bind_param("s", $email);
    $emailCheck->execute();
    $result = $emailCheck->get_result();

    if ($result->num_rows > 0) {
        die("Email already registered.");
    }

    // Insert data into database
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute()) {
        // Send welcome email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main SMTP server (e.g., Gmail)
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'cricxpert77@gmail.com'; // Your email address
            $mail->Password = 'tceg pqaj qedd jvwi'; // Your app password (if using Gmail)
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port for TLS

            // Recipients
            $mail->setFrom('cricxpert77@gmail.com', 'CricXpert'); // Sender email and name
            $mail->addAddress($email, $firstName . ' ' . $lastName); // Recipient's email and name

            // Email content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Welcome to CricXpert';
            $mail->Body    = "Dear $firstName $lastName,<br><br>Welcome to CricXpert! We are excited to have you onboard.<br><br>Best regards,<br>CricXpert Team";
            $mail->AltBody = "Dear $firstName $lastName,\n\nWelcome to CricXpert! We are excited to have you onboard.\n\nBest regards,\nCricXpert Team"; // Plain text version

            // Send the email
            $mail->send();
            echo 'Registration successful and welcome email sent!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error; // Display error if insert fails
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>