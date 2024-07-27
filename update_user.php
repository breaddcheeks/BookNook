<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['UserID'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    if (empty($password)) {
        // If password is empty, don't update it
        $sql = "UPDATE user SET Username='$username', Email='$email' WHERE UserID=$userID";
    } else {
        // If password is not empty, update it as well
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET Username='$username', Email='$email', Password='$password' WHERE UserID=$userID";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
