<?php
session_start();
include_once "../connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

if(isset($email) && isset($password)){
  $user_data = "email=".$email;
  $error_message = '';

    if(empty($email)){
      $error_message = "Email is required";
    } elseif (empty($password)){
      $error_message = "Password is required";
    } else {
    	$sql = "SELECT * FROM users WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$email]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();
          $u_id =  $user['id'];
          $u_email =  $user['email'];
          $u_password =  $user['password'];

        if(($email === $u_email) && (password_verify($password, $u_password)) ){
            $_SESSION['id'] = $u_id;
            $_SESSION['email'] = $u_email;
            header("Location: ../index.php");
            exit;
          } else {
            $error_message = "Incorect User name or password";
            header("Location: ../login.php?error=$error_message&$user_data");
            exit;
          }
      } else {
        $error_message = "Incorect User name or password";
        header("Location: ../login.php?error=$error_message&$user_data");
        exit;
      }
    }
} else {
	header("Location: ../login.php?error=error");
	exit;
}
