<?php

session_start();


// Set cache control headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Assuming you have a PostgreSQL database connection established
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../conn_db.php';

// Establish the database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // After retrieving email and password
    //echo "Email: $email, Password: $password";

    // Validate email and password (you may want to add more validation here)

    // Perform the database check using parameterized query to prevent SQL injection
    $sql = "SELECT * FROM USERS WHERE email = $1 AND password = $2 AND is_verified = true";

    //echo "SQL Query: $sql";

    $result = pg_query_params($conn, $sql, array($email, $password));

    if (pg_num_rows($result) > 0) {
        // User exists and is verified, perform login actions
        // Retrieve the username from the query result
        $user_row = pg_fetch_assoc($result);
        $username = $user_row['username'];
        
        // Start session variables
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        echo "success";
        
        // Redirect to another page
        //header("Location: /project/profile/user-page.php");
        exit;
    } else {
        // Check if the user exists but is not verified
        $sqlUnverified = "SELECT * FROM USERS WHERE email = $1 AND password = $2 AND is_verified = false";
        $resultUnverified = pg_query_params($conn, $sqlUnverified, array($email, $password));

        if (pg_num_rows($resultUnverified) > 0) {
            // User exists but is not verified
            echo "unverified";
        } else {
            // User does not exist, is not verified, or login failed
            echo "failure";
        }
    }
} else {
    // Handle non-POST requests if needed
    echo "Invalid request method";
}

pg_close($conn);
?>




