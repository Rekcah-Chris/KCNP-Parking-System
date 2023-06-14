<?php
if (empty($_POST['Email']) || empty($_POST['Password'])) {
  echo "All fields are required";
} else {
  $email = $_POST['Email'];
  $password = $_POST['Password'];

  // Hash the password (you can use a stronger hashing algorithm and add salt)
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Database connection
  $con = new mysqli('localhost', 'root', '', 'parking_db');
  if ($con->connect_error) {
    die('Connection Failed: ' . $con->connect_error);
  } else {
    $stmt = $con->prepare("SELECT * FROM `admin_login` WHERE Email = ?");
    $stmt->bind_param("s", $email); 
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if (password_verify($password, $data['Password'])) {
        echo "<h2>Login Successful</h2>";
        // Insert data into database after successful login
        $stmt = $con->prepare("INSERT INTO `login` (Email, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);
        $stmt->execute();

       
      } else {
        // Password does not match
        echo "<script>alert('Password does not match. Please try again.');</script>";
        echo "<style>.alert { display: block; background-color: #f8d7da; color: #721c24; padding: 10px; }</style>";
        echo "<div class='alert'>Password does not match. Please try again.</div>";
        echo "<script>document.getElementById('log-form').reset();</script>";
        echo "<script>window.location.href = 'login.html';</script>";
      }
    } else {
      // User does not exist
      echo "<script>alert('User does not exist. Please try again.');</script>";
      echo "<style>.alert { display: block; background-color: #f8d7da; color: #721c24; padding: 10px; }</style>";
      echo "<div class='alert'>User does not exist. Please try again.</div>";
      echo "<script>document.getElementById('log-form').reset();</script>";
      echo "<script>window.location.href = 'login.html';</script>";
    }
  }

  // Redirect to admin dashboard page
  header('Location: index.html');
  exit();
}
?>
