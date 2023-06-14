<?php
if (isset($_POST['Signup'])) {
  // Check if all fields are filled
  if (empty($_POST['Name']) || empty($_POST['Email']) || empty($_POST['Password'])) {
    echo "All fields are required";
  } else {
    $user_Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Hash the password (you can use a stronger hashing algorithm and add salt)
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'parking_db');
    if ($conn->connect_error) {
      die('Connection Failed: ' . $conn->connect_error);
    } else {
      $stmt = $conn->prepare("INSERT INTO `admin_login` (Name, Email, Password) VALUES (?, ?, ?)");

      if (!$stmt) {
        die('Statement Preparation Failed: ' . $conn->error);
      }

      $bindResult = $stmt->bind_param("sss", $user_Name, $Email, $hashedPassword);
      if (!$bindResult) {
        die('Parameter Binding Failed: ' . $stmt->error);
      }

      $executeResult = $stmt->execute();
      if (!$executeResult) {
        die('Statement Execution Failed: ' . $stmt->error);
      }

      echo "Sign up Successful.....";
      $stmt->close();
      $conn->close();

      // Redirect to login page
      header('Location: login.html');
      exit();
    }
  }
}
?>
