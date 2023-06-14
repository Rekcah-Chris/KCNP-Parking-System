<?php
if (isset($_POST["sendBtn"])) {
    // Check if all fields are filled
    if (empty($_POST["Your_Name"]) || empty($_POST["Your_Email"]) || empty($_POST["User_Message"]) || empty($_POST["To_Email"])) {
        echo "All fields are required";
    } else {
        // Get data from the POST request
        $yourName = $_POST["Your_Name"];
        $yourEmail = $_POST["Your_Email"];
        $userMessage = $_POST["User_Message"];
        $toEmail = $_POST["To_Email"];

        // Database connection
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "parking_db";

        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to insert data into the email table
        $query = "INSERT INTO email (Your_Name, Your_Email, User_Message, To_Email) 
                  VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Check if the prepare statement succeeded
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $yourName, $yourEmail, $userMessage, $toEmail);
            $insert = mysqli_stmt_execute($stmt);

            // If data is saved, redirect to the next page, else throw an error
            if ($insert) {
                header("Location: index.html");
                exit(); // Make sure to exit after the redirect
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error: Unable to prepare the statement";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
        
        // Close the database connection
        mysqli_close($conn);
    }
}
?>
