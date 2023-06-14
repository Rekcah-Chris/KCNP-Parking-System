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
$sql = "SELECT * FROM `parking_fee_table`"; 

// Execute the query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Start the table structure
    $html = '<table>';
    $html .= '<tr>';
    $html .= '<th>Date In</th>';
    $html .= '<th>Parking Fee Amount</th>';
    $html .= '<th>Date Out</th>';

    $html .= '</tr>';

    // Loop through the rows and add data to the table
    while ($row = $result->fetch_assoc()) {
        // Check if the "Parking_Fee_Id" key exists in the row
        if (isset($row["Parking_Fee_Id"])) {
            $parking_fee_Id = $row["Parking_Fee_Id"];
        } else {
            $parking_fee_Id = ""; // Assign a default value if the key is not found
        }

        // Access other data using column names
        $date_In = $row["Date_In"];
        $parking_fee_Amount = $row["Parking_Fee_Amount"];
        $date_Out = $row["Date_Out"];

        // Add CSS styles
        $html .= '<style>';
        $html .= 'table { border-collapse: collapse; }';
        $html .= 'table tr { border-bottom: 1px solid #FFCA28; }';
        $html .= 'table td { padding: 5px; text-align: flex; }';
        $html .= 'table tr:nth-child(even) td { background-color: #FFF176; }';
        $html .= '</style>';

        // Add a row to the table
        $html .= '<tr>';
        $html .= '<td>' . $date_In . '</td>';
        $html .= '<td>' . $parking_fee_Amount . '</td>';
        $html .= '<td>' . $date_Out . '</td>';
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
