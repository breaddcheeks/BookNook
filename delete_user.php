<?php
include 'config.php';

if (isset($_GET['UserID'])) {
    $userID = $_GET['UserID'];

    $sql = "DELETE FROM user WHERE UserID = $userID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid user ID.";
}
?>
