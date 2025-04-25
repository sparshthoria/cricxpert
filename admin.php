<?php
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

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white; /* White background */
            color: black; /* Black text color */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: red; /* Red heading */
            text-align: left; /* Left-aligned heading */
            margin-bottom: 20px; /* Space below heading */
            font-size: 36px; /* Double font size */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Center the table */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        th, td {
            padding: 15px; /* Increased padding for better spacing */
            text-align: left; /* Left-aligned text */
            border: 1px solid #ddd;
        }
        th {
            background-color: red; /* Red header background */
            color: white; /* White text for header */
        }
        tr {
            background-color: #030e4f; /* Dark blue background for rows */
            color: white; /* White text for rows */
        }
        button {
            background-color: #030e4f; /* Dark blue button */
            color: white; /* White text for button */
            padding: 10px 20px; /* Increased padding */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 20px 0; /* Margin for spacing */
            display: block; /* Make button a block element */
            transition: background-color 0.3s; /* Smooth transition */
        }
        button:hover {
            background-color: #ff4d4d; /* Lighter red on hover */
        }
        .no-users {
            text-align: left; /* Left-aligned message */
            font-size: 18px; /* Larger font size */
            color: #ffcc00; /* Yellow color for visibility */
        }
    </style>
</head>
<body>

<?php
// Check if the query was successful
if ($result->num_rows > 0) {
    // Display the data in a table
    echo "<h2>User Data</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    // Loop through each row of the result
    while ($user = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['first_name'] . "</td>";
        echo "<td>" . $user['last_name'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<h2 class='no-users'>No users found.</h2>"; // Centered message for no users
}

// Close the connection
$conn->close();
?>

<!-- Add a button to redirect to CricXpert.php -->
<button onclick="location.href='CricXpert.php'">Go to CricXpert</button>

</body>
</html>