<?php
// Check if form is submitted
if(isset($_POST['btn_next'])) {
  if (empty($_POST["Plate_No"]) || empty($_POST["Parking_Fee_Type"]))
  {
    echo "All fields are required";
  } else {
    // Get Data from the HTML form
    
    $plate_No =  $_POST["Plate_No"];
    $parking_fee_Type = $_POST["Parking_Fee_Type"];
    
    // Connection to db from external file
    require_once "connection.php";

    // Check if the Plate_No exists in the vehicle_table
    $sql = "SELECT * FROM `vehicle_table` WHERE Car_ID = '$car_Id' ";
    $sqlRes = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($sqlRes);

    // If the Plate_No does not exist in the vehicle_table, insert data into parking_table
    if ($row_count == 0) {
      // Querying the database
      $query = "INSERT INTO `parking_table`(`Plate_No`, `Parking_Fee_Type`) VALUES ('$plate_No','$parking_fee_Type')";
      $insert = mysqli_query($conn, $query);

      // if data is saved, redirect to the next page else throw error
      if($insert){
        header("Location: fee.html");
        exit();
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }

    } else {
      echo "Error: Plate number already exists in the database.";
    }
     // Close the database connection
     mysqli_close($conn);
  }

}
?>
