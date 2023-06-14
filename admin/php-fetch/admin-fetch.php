<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT * FROM `admin_login`"; 

// Execute the query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Start the table structure
    $html = '<table>';
    $html .= '<tr>';
    
    $html .= '<th>Email</th>';
    $html .= '<th>Password</th>';
    $html .= '</tr>';

    // Loop through the rows and add data to the table
    while ($row = $result->fetch_assoc()) {
        // Access data using column names
        
        $email = $row["Email"];
        $password = $row["Password"];
        
        // Add CSS styles
        $html .= '<style>';
        $html .= 'table { border-collapse: collapse; }';
        $html .= 'table tr { border-bottom: 1px solid #FFCA28; }';
        $html .= 'table td { padding: 5px; text-align: flex; }';
        $html .= 'table tr:nth-child(even) td { background-color: #FFF176; }';
        $html .= '</style>';


        // Add a row to the table
        $html .= '<tr>';
        
        $html .= '<td>' . $email . '</td>';
        $html .= '<td>' . $password . '</td>';
        $html .= '</tr>';
    }

    // End the table structure
    $html .= '</table>';

    
    // Return the HTML string as a response
    echo $html;
} else {
    echo "No data found";
}

// Close the connection
$conn->close();
?>