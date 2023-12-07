<?php
  session_start();
  include_once "connection.php";
  function getUserById($id, $conn) {
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllUsers($db, $currentUserId) {
    $sql = "SELECT * FROM users WHERE id != :current_user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':current_user_id', $currentUserId);
    $stmt->execute();

    return $stmt->fetchAll();
}
  function updateUser($id, $email, $firstname, $middlename, $lastname, $birthdate, $age, $gender, $address, $image, $db) {
    try {
        $sql = "UPDATE users
                SET email = ?, firstname = ?, middlename = ?, lastname = ?,
                    birthdate = ?, age = ?, gender = ?, address = ?, image = ?
                WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email, $firstname, $middlename, $lastname, $birthdate, $age, $gender, $address, $image, $id]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}


