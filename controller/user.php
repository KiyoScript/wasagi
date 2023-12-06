<?php
  session_start();
  include_once "connection.php";
  function getUserById($id, $db){
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();
          return $user;
      }else {
          return 0;
      }
  }

  function getAllUsers($db, $current_user_id){
    $sql = "SELECT * FROM users WHERE id != :current_user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':current_user_id', $current_user_id);
    $stmt->execute();

    $users = $stmt->fetchAll();
    return $users;
  }
