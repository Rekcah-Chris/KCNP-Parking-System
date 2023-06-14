<?php
 if (empty($_POST['user_Id']) or empty($_POST['user_Name']) or empty($_POST['Phone']) or empty($_POST['Password']))
 {
   echo "All field required";
 }else {

   $user_Id = $_POST['user_Id']; 
   $user_Name = $_POST['user_Name'];
   $Phone = $_POST['Phone'];
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];

   // Hash the password (you can use a stronger hashing algorithm and add salt)
   $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);


   //database connection

  $conn = new mysqli('localhost','root','','parking_db');
   if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
   }else{
        $stmt = $conn->prepare("INSERT INTO signup (user_Id, user_Name, Phone, Email, Password)
            values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$user_Id, $user_Name, $Phone, $Email, $hashedPassword);
        $stmt->execute();
        echo "Sign up Successfully.....";
        $stmt->close();
        $conn->close();

        // redirect to login page
        header('Location: signin.html');
        exit();
   }
}
?>