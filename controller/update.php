<?php
session_start();

include_once 'user.php';

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once '../connection.php';
        include_once '../controller/user.php';

        $id = $_SESSION['id'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $firstName = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $middleName = filter_var($_POST['middlename'], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $birthdate = $_POST['birthdate']; // You might want to add validation
        $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
        $gender = $_POST['gender'];
        $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $image = $_FILES['image']['name'];
        $oldImage = $_POST['old_image'];

        if (!empty($_FILES['image']['name'])) {
            $uploadDirectory = '../upload/';
            $image = $uploadDirectory . uniqid() . '_' . basename($_FILES['image']['name']);

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                // Image upload successful, continue with other data processing
            } else {
                // Image upload failed, handle the error as needed
                $_SESSION['error_message'] = 'Error uploading image';
                header('Location: ../profile.php?id=' . $id);
                exit;
            }
        } else {
            $image = $oldImage;
        }

        // Update user profile
        if (updateUser($id, $email, $firstName, $middleName, $lastName, $birthdate, $age, $gender, $address, $image, $conn)) {
            $_SESSION['success_message'] = 'Profile updated successfully';
            header('Location: ../profile.php?id=' . $id);
            exit;
        } else {
            $_SESSION['error_message'] = 'Error updating profile';
            header('Location: ../profile.php?id=' . $id);
            exit;
        }
    } else {
        header('Location: ../profile.php?id=' . $_SESSION['id']);
        exit;
    }
} else {
    header('Location: ../login.php');
    exit;
}
