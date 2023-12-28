<?php
session_start();
require_once '../connection.php';
require_once 'user.php';


$userId = $_SESSION['id'];

if (deleteUser($userId, $conn)) {
    session_destroy();
    header("Location: ../login.php?success=User deleted successfully");
    exit();
} else {
    echo "Failed to delete user.";
}
?>
