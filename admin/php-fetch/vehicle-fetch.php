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
$sql = "SELECT * FROM `vehicle_table`"; 

// Execute the query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Start the table structure
    $html = '<table>';
    $html .= '<tr>';
    $html .= '<th>Car ID</th>';
    $html .= '<th>Car Type</th>';
    $html .= '<th>Car Owner</th>';
   
    $html .= '</tr>';

    // Loop through the rows and add data to the table
    while ($row = $result->fetch_assoc()) {
        // Access data using column names
        $car_Id = $row["Car_ID"];
        $car_Type = $row["Car_Type"];
        $car_Owner = $row["Car_Owner"];
       
        
        // Check if the "Car_Caregory" key exists in the row
        if (isset($row["Car_Category"])) {
            $car_Category = $row["Car_Category"];
        } else {
            $car_Category = ""; // Assign a default value if the key is not found
        }
    
        // Add CSS styles
        $html .= '<style>';
        $html .= 'table { border-collapse: collapse; }';
        $html .= 'table tr { border-bottom: 1px solid #FFCA28; }';
        $html .= 'table td { padding: 5px; text-align: flex; }';
        $html .= 'table tr:nth-child(even) td { background-color: #FFF176; }';
        $html .= '</style>';

        // Add a row to the table
        $html .= '<tr>';
        $html .= '<td>' . $car_Id . '</td>';
        $html .= '<td>' . $car_Type . '</td>';
        $html .= '<td>' . $car_Owner . '</td>';
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