<?php
// Check if form is submitted
if(isset($_POST['btn_next'])) {
  if (empty($_POST["Date_In"]) or empty($_POST["Parking_Fee_Amount"]) or empty($_POST["Date_Out"]))
  {
    echo "All field required";
  }else {
 //Get Data from the html form
 
 $date_In = $_POST["Date_In"];
 $parking_fee_Amount =  $_POST["Parking_Fee_Amount"];
 $date_Out = $_POST["Date_Out"];
 
 // Connection to db from external file
require_once "connection.php";

// Check if the Car_ID exists in the parking_table
$sql = "SELECT * FROM `parking_table` WHERE Parking_ID = '$parking_Id' ";
$sqlRes = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($sqlRes);

 // If the Car_ID does not exist in the parking_table, insert data into parking_fee_table
if ($row_count == 0) {
  // Querying the database
  $query = "INSERT INTO `parking_fee_table`(`Parking_Fee_Id`, `Date_In`, `Parking_Fee_Amount`, `Date_Out`) VALUES (null,'$date_In','$parking_fee_Amount','$date_Out')";
  $insert = mysqli_query($conn, $query);

  // if data is saved head to the next page else throw error
  if(isset($insert)){
    header(header:"location:slot.html");
  }else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

} else {
  echo "Error: Check your code";
}
}
}
?>

                                                                                                              