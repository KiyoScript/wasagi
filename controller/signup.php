<?php
include_once "../connection.php";

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$address = $_POST['address'];
$mobile_number = $_POST['mobile_number'];

if (isset($email) && isset($password) && isset($firstname) && isset($middlename) && isset($lastname) && isset($birthdate) && isset($gender) && isset($age) && isset($address) && isset($mobile_number)) {
    $user_data = "email=" . $email . "firstname=" . $firstname . "lastname=" . $lastname . "birthdate=" . $birthdate . "gender=" . $gender . "age=" . $age . "address=" . $address . "mobile_number=" . $mobile_number;
    $error_message = '';

    if (empty($email)) {
        $error_message = "Email is required";
    } elseif (empty($firstname)) {
        $error_message = "First name is required";
    } elseif (empty($middlename)) {
        $error_message = "Middle name is required";
    } elseif (empty($lastname)) {
        $error_message = "Last name is required";
    } elseif (empty($birthdate)) {
        $error_message = "Birthdate is required";
    } elseif (empty($gender)) {
        $error_message = "Gender is required";
    } elseif (empty($age)) {
        $error_message = "Age is required";
    } elseif (empty($address)) {
        $error_message = "Address is required";
    } elseif (empty($mobile_number)) {
        $error_message = "Mobile number is required";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(email, firstname, middlename, lastname, birthdate, gender, age, address, mobile_number, password) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $firstname, $middlename, $lastname, $birthdate, $gender, $age, $address, $mobile_number, $password]);

        header("Location: ../signup.php?success=Successfully Created!");
        exit;
    }
    header("Location: ../signup.php?error=$error_message&$user_data");
    exit;
} else {
    header("Location: ../signup.php?error=error");
    exit;
}
