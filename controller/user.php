<?php
class User {
    public $id;
    public $email;
    public $firstName;
    public $middleName;
    public $lastName;
    public $birthDate;
    public $age;
    public $gender;
    public $address;
    public $image;
    public $password;
}

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

function updateUser(User $user, $db) {
    try {
        $sql = "UPDATE users
                SET email = ?, firstname = ?, middlename = ?, lastname = ?,
                    birthdate = ?, age = ?, gender = ?, address = ?, image = ?
                WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $user->email,
            $user->firstName,
            $user->middleName,
            $user->lastName,
            $user->birthDate,
            $user->age,
            $user->gender,
            $user->address,
            $user->image,
            $user->id
        ]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}
