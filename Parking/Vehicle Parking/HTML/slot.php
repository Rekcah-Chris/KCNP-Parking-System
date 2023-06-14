<?php
// Check if form is submitted
if(isset($_POST['btn_done'])) {
  if (empty($_POST["Parking_Slot_Type"]) || empty($_POST["Parking_Slot_Number"])) {
    echo "All fields are required";
  } else {
    // Get Data from the HTML form
    $parking_slot_Type = $_POST["Parking_Slot_Type"];
    $parking_slot_Number = $_POST["Parking_Slot_Number"];
    
    // Connection to db from external file
    require_once "connection.php";

    // Check if the Parking_Fee_Id exists in the parking_fee_table
    $sql = "SELECT * FROM `parking_fee_table` WHERE Parking_Fee_Id = '$parking_fee_Id'";
    $sqlRes = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($sqlRes);

    // If the Parking_Fee_Id does not exist in the parking_fee_table, insert data into parking_slot_table
    if ($row_count == 0) {
      // Querying the database
      $query = "INSERT INTO `parking_slot_table`(`Parking_Slot_Type`, `Parking_Slot_Number`) VALUES ('$parking_slot_Type','$parking_slot_Number')";
      $insert = mysqli_query($conn, $query);

      // if data is saved, redirect to the next page else throw error
      if($insert) {
        header("Location: index.html");
        exit();
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }

    } else {
      echo "Error: Parking fee ID already exists in the database.";
    }
  }
}
?>
