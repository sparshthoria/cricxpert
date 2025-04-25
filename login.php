<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$host = 'localhost';  // Database host (e.g., localhost)
$dbname = 'ds';  // Database name (make sure this matches your actual database)
$username = 'root';  // Database username
$password = '';  // Database password

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); // Trim whitespace from email
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password matches, login successful
            session_start(); // Start a session
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['first_name'] = $user['first_name']; // Store first name in session
            $_SESSION['last_name'] = $user['last_name']; // Store last name in session
            
            // Debugging output
            echo "User  logged in: " . $email . "<br>";

            // Check if the user is admin
            if ($email === 'Admin@gmail.com') {
                // Debugging output
                echo "Redirecting to admin page...<br>";
                header("Location: admin.php");  // Redirect to admin page
            } else {
                // Debugging output
                echo "Redirecting to user dashboard...<br>";
                header("Location: CricXpert.php");  // Redirect to your home page or dashboard
            }
            exit(); // Ensure no further code is executed
        } else {
            // Incorrect password
            header("Location: login.html?error=invalid_password"); // Redirect to login.html with error
            exit();
        }
    } else {
        // Email does not exist
        header("Location: login.html?error=email_not_found"); // Redirect to login.html with error
        exit();
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>