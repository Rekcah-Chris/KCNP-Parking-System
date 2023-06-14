<?php
// Check if form is submitted
if (isset($_POST['btn_next'])) {
  if (empty($_POST["Car_Type"]) || empty($_POST["Car_Owner"]) || empty($_POST["Car_Category"])) {
    echo "All fields are required";
  } else {
    // Get Data from the HTML form
    $car_Type = $_POST["Car_Type"];
    $car_Owner = $_POST["Car_Owner"];
    $car_Category = $_POST["Car_Category"];

    // Connection to the database from external file
    require_once "connection.php";

    // Check if the Car_Type exists in the vehicle_table
    $sql = "SELECT * FROM `vehicle_table` WHERE Car_Type = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $car_Type);
    mysqli_stmt_execute($stmt);
    $sqlRes = mysqli_stmt_get_result($stmt);

    if (!$sqlRes) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      exit(); // Stop execution if there is an error
    }

    $row_count = mysqli_num_rows($sqlRes);

    // If the Car_Type does not exist in the vehicle_table, insert data into vehicle_table
    if ($row_count == 0) {
      // Query the database using prepared statement
      $query = "INSERT INTO `vehicle_table` (`Car_ID`, `Car_Type`, `Car_Owner`, `Car_Category`) VALUES (NULL, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "sss", $car_Type, $car_Owner, $car_Category);
      $insert = mysqli_stmt_execute($stmt);

      if (!$insert) {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        exit(); // Stop execution if there is an error
      }

      // If data is saved, redirect to the next page
      header("location: parking.html");
      exit();
    } else {
      echo "Error: Car Type already exists in the table.";
    }
  }
}
?>