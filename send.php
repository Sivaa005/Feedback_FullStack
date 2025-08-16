<?php
$servername = "localhost";
$username = "root";
$password = ""; // no password, as you mentioned
$db_name = "feedback";

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Connect to MySQL
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Get values from form
    $user = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert into DB
    $sql = "INSERT INTO greetings (username, email, message) VALUES ('$user', '$email', '$message')";
    $conn->query($sql);

    echo "Data added successfully!";
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>
